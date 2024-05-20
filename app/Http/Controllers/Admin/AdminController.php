<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Assistant;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\GeneralSetting;
use App\Models\Location;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    public function dashboard()
    {
        $pageTitle = 'Dashboard';
        $admin = auth()->guard('admin')->user();

        $total_doctor           = Doctor::all()->count();
        $total_staff            = Staff::all()->count();
        $total_assistant        = Assistant::all()->count();
        $total_department       = Department::all()->count();
        $total_location         = Location::all()->count();
        $total_new_appointments = Appointment::where('is_complete',0)->count();
        // dd($total_new_appointments);
        $total_done_appointments= Appointment::where('is_complete',1)->count();
        // dd($total_done_appointments);
        return view('admin.dashboard', compact('pageTitle', 'admin', 'total_doctor', 'total_staff', 'total_assistant',
            'total_department', 'total_location', 'total_new_appointments', 'total_done_appointments'));
    }

    // $total_doctor = Doctor::all()->count();
    //     $total_department = Department::all()->count();

    public function profile()
    {
        $pageTitle = 'Profiles';
        $admin = auth('admin')->user();
        return view('admin.profile', compact('pageTitle', 'admin'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])]
        ]);
        $user = auth('admin')->user();

        if ($request->hasFile('image')) {
            try {
                $old = $user->image;
                $user->image = fileUploader($request->image, getFilePath('adminProfile'), getFileSize('adminProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $notify[] = ['success', 'Profile Updated Successfully'];

        return to_route('admin.profile')->withNotify($notify);
    }

    public function password()
    {
        $pageTitle = 'Password';
        $admin = auth('admin')->user();
        return view('admin.password', compact('admin', 'pageTitle'));
    }
    
    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password'     => 'required|min:5|confirmed'
        ]);

        $user = auth('admin')->user();
        if (!Hash::check($request->old_password, $user->password)) {
            $notify[] = ['error', 'password doesn\'t match!!'];
            return back()->withNotify($notify);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $notify[] = ['success', 'Password changed successfully.'];
        return to_route('admin.password')->withNotify($notify);
    }
    
}
