<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;

class LoginRegisterController extends Controller
{
    public function loginRegisterForm()
    {
        return view('customer.auth.login-register');
    }
}
