<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Models\User;

class LoginRegisterController extends Controller
{
    public function loginRegisterForm()
    {
        return view('customer.auth.login-register');
    }

    public function loginRegister(LoginRegisterRequest $request)
    {
        $inputs = $request->all();
        // check identify is email or not
        if (filter_var($inputs['identify'], FILTER_VALIDATE_EMAIL)) {
            $type = 1; // 1 => email
            $user = User::where('email', $inputs['identify'])->first();
            if (empty($user)) {
                $newUser['email'] = $inputs['identify'];
            }
        } // check identify is mobile or not
        elseif (preg_match('/^(\+98|98|0)9\d{9}$/', $inputs['identify'])) {
            $type = 0; // 0 => mobile

            // all mobile numbers are in on format 9** *** ***
            $inputs['identify'] = ltrim($inputs['identify'], '0');
            $inputs['identify'] = substr($inputs['identify'], 0, 2) == '98' ? substr($inputs['identify'], 2) : $inputs['identify'];
            $inputs['identify'] = str_replace('+98', '', $inputs['identify']);

            $user = User::where('mobile', $inputs['identify'])->first();
            if (empty($user)) {
                $newUser['mobile'] = $inputs['identify'];
            }
        }
        else {
            $message = 'شناسه ورودی شما نه موبایل است نه ایمیل';
            return redirect()->route('auth.customer-login-register-form')->withErrors(['identify' => $message]);
        }
    }
}
