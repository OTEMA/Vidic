<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function showLoginForm() {
        return view('Auth.admin-login');
    }
    public function login(){
        return true;
    }
}
