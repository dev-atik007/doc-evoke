<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function dashboard()
    {
        $pageTitle = 'Doctor Dashboard';
        $doctor = auth()->guard('doctor')->user();
        return view('doctor.dashboard', compact('pageTitle', 'doctor'));
    }

    public function profile()
    {
        $pageTitle = 'Doctor Settings';
        $doctor = auth()->guard('doctor')->user();
        return view('doctor.info.profile', compact('pageTitle', 'doctor'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])]
        ]);
        $doctor = auth()->guard('doctor')->user();

        if ($request->hasFile('image')) {
            try {
                $doctor->image = fileUploader($request->image, getFilePath('doctorProfile'), getFileSize('doctorProfile'), $doctor->image);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
            $doctor->save();

            $notify[] = ['success', 'Your profile has been updated.'];
            return back()->withNotify($notify);
        }
    }

    public function password()
    {
        $pageTitle = 'Doctor Password';
        $doctor = auth()->guard('doctor')->user();
        return view('doctor.info.password', compact('pageTitle', 'doctor'));
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password'  => 'required',
            'password'      => 'required|min:5|confirmed',
        ]);

        $doctor = auth()->guard('doctor')->user();
        if (!Hash::check($request->old_password, $doctor->password)) {
            $notify[] = ['error', 'password doesn\'t match!!'];
            return back()->withNotify($notify);
        }
        $doctor->password = bcrypt($request->password);
        $doctor->save();

        $notify[] = ['success', 'Password changed successfully.'];
        return to_route('doctor.password')->withNotify($notify);
    }

    
}
