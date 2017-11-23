<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller {

    protected $redirectTo = '/admin';
    protected $guard = 'admin';

    public function __construct() {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm() {
        return view('auth.admin-login');
    }

    public function login(Request $request) {
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:9|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ]);

        // atttempt to log in the user

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful redirect to their intetded location
            return redirect()->intended(route('admin.dashboard'));
        }
        // if unsucefull then redirect back to the login
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    protected function guard() {
        return \Auth::guard('admin');
    }

}
