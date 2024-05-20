<?php

namespace App\Http\Controllers\Assistant;

use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AssistantController extends Controller
{
    public function dashboard() 
    {
        $pageTitle = 'Dashboard';
        $assistant = Auth::guard('assistant')->user();
        $doctors   = $assistant->doctors()->orderBy('name')->get();
        return view('assistant.dashboard', compact('pageTitle', 'doctors'));
    }

    public function profile()
    {
        $pageTitle = 'Profile';
        $assistant = auth()->guard('assistant')->user();
        // dd(auth()->guard('assistant')->user());
        return view('assistant.info.profile', compact('pageTitle', 'assistant'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, 
        [
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])]
        ]);

        $assistant = auth()->guard('assistant')->user();

        if($request->hasFile('image')) {
            try {
                $assistant->image = fileUploader($request->image, getFilePath('assistantProfile'), getFileSize('assistantProfile'), $assistant->image);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
            $assistant->save();

            $notify[] = ['success', 'Your profile has been updated.'];
            return back()->withNotify($notify);
        }
    }

    public function password()
    {
        $pageTitle = 'Password';
        $assistant = auth()->guard('assistant')->user();
        return view('assistant.info.password', compact('pageTitle', 'assistant'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password'  => 'required',
            'password'      => 'required|min:5|confirmed',
        ]);

        $assistant = auth()->guard('assistant')->user();
        if(!Hash::check($request->old_password, $assistant->password)) {
            $notify[] = ['error', 'password doesn\'t match!!'];
            return back()->withNotify($notify);
        }
        $assistant->password = bcrypt($request->password);
        $assistant->save();

        $notify[] = ['success', 'Password changed successfully.'];
        return back()->withNotify($notify);
    }
}
