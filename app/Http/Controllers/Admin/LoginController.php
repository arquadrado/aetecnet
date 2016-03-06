<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function dashboard()
    {
        return 'hey';
    }
    public function login()
    {   
        return view('admin.login');
    }
    public function authenticate()
    {   
        $requestData = request()->all();
        $email = $requestData['email'];
        $password = $requestData['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect()->intended('admin');
        }
    }
}