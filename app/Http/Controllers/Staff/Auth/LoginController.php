<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = 'staff';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // parent::__construct();

        $this->middleware('staff.guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        // dd(Hash::make('staff'));
        $pageTitle = "Staff Login";
        return view('staff.auth.login', compact('pageTitle'));
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {   
        return auth()->guard('staff');
    }

    public function username()
    {
        return 'username';
    }
 
    public function login(Request $request) 
    {
        // dd($request->all());
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);

    }
    
    public function logout(Request $request)
    {
        $this->guard('staff')->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect()->route('staff.login');
    }
}
