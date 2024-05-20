<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function dashboard()
    {
        $pageTitle = 'Dashboard';
        $staff = auth()->guard('staff')->user();
        return view('staff.dashboard', compact('pageTitle', 'staff'));
    }

    public function profile()
    {
        $pageTitle = 'Profile';
        $staff = auth()->guard('staff')->user();
        return view('staff.info.profile', compact('pageTitle', 'staff'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'image'   => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])] 
        ]);

        $staff = auth()->guard('staff')->user();

        if($request->hasFile('image')) {
            try {
                $staff->image = fileUploader($request->image, getFilePath('staffProfile'), getFileSize('staffProfile'), $staff->image);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
            $staff->save();

            $notify[] = ['success', 'Your profile has been updated.'];
            return back()->withNotify($notify);
        }
    }

    public function password()
    {
        $pageTitle = 'Password';
        $staff = auth()->guard('staff')->user();
        return view('staff.info.password', compact('pageTitle', 'staff'));
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password'  => 'required',
            'password'      => 'required|min:5|confirmed',
        ]);

        $staff = auth()->guard('staff')->user();
        if(!Hash::check($request->old_password, $staff->password)) {
            $notify[] = ['error', 'password doesn\'t match!!'];
            return back()->withNotify($notify);
        }
        $staff->password = bcrypt($request->password);
        $staff->save();

        $notify[] = ['success', 'Password changed successfully.'];
        return back()->withNotify($notify);

    }


}
