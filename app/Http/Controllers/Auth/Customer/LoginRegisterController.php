<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        } else {
            $message = 'شناسه ورودی شما نه موبایل است نه ایمیل';
            return redirect()->route('auth.customer-login-register-form')->withErrors(['identify' => $message]);
        }

        if (empty($user)) {
            $newUser['password'] = Hash::make('12345678910');
            $newUser['activation'] = 1;
            $user = User::create($newUser);
        }

        // Create OTP Code
        $otpCode = rand(111111, 999999);
        $token = Str::random(60);
        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_identify' => $inputs['identify'],
            'type' => $type,
        ];

        Otp::create($otpInputs);

        // send sms or email

        if ($type == 0) {
            // send sms
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo(array('0' . $user->mobile));
            $smsService->setText("مجموعه آمازون \n کد تایید: $otpCode");
            $smsService->setIsFlash(true);
            $messageService = new MessageService($smsService);
        } elseif ($type == 1) {
            // email send

            $emailService = new EmailService();
            $details = [
                'title' => "ایمیل فعال سازی",
                'body' => "کد فعال سازی : {$otpCode}",
            ];
            $emailService->setDetails($details);
            $emailService->setFrom("no-reply@example.com", "example");
            $emailService->setSubject("کد احراز هویت");
            $emailService->setTo($inputs['identify']);
            $messageService = new MessageService($emailService);
        }
        $messageService->send();
        return redirect()->route('auth.customer-login-confirm-form', $token);
    }

    public function loginConfirmForm($token)
    {
        $otp = Otp::where('token', $token)->first();
        if (empty($otp)) {
            return redirect()->route('auth.customer-login-register-form')->withErrors(['identify' => 'آدرس وارد شده نامعتبر میباشد']);
        }
        return view('customer.auth.login-confirm', compact('token', 'otp'));
    }

    public function LoginConfirm($token, LoginRegisterRequest $request)
    {
        $inputs = $request->all();
        $otp = Otp::where('token', $token)->where('used', 0)->where('created_at', '>=', Carbon::now()->subMinute(5)->toDateTimeString())->first();
        if (empty($otp)) {
            return redirect()->route('auth.customer-login-register-form', $token)->withErrors(['identify' => 'آدرس وارد شده نامعتبر میباشد']);
        }
        // if otp not match
        if ($otp->otp_code !== $inputs['otp']) {
            return redirect()->route('auth.customer-login-confirm-form', $token)->withErrors(['otp' => 'کد تایید وارد شده نامعتبر است.']);
        }
        // if everything is ok
        $otp->update(['used' => 1]);
        $user = $otp->user()->first();
        if ($otp->type == 0 && empty($user->mobile_verified_at)) {
            $user->update(['mobile_verified_at' => Carbon::now()]);
        } elseif ($otp->type == 1 && empty($user->email_verified_at)) {
            $user->update(['email_verified_at' => Carbon::now()]);
        }
        Auth::login($user);
        return redirect()->route('customer.home');
    }

    public function loginResendOtp($token)
    {
        $otp = Otp::query()->where('token', $token)->where('created_at', '<=', Carbon::now()->subMinute(5)->toDateTimeString())->first();
        if (empty($otp)) {
            return redirect()->route('auth.customer-login-register-form', $token)->withErrors(['identify' => 'آدرس وارد شده نامعتبر است.']);
        }
        $user = $otp->user()->first();
        // Create OTP Code
        $otpCode = rand(111111, 999999);
        $token = Str::random(60);
        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_identify' => $otp->login_identify,
            'type' => $otp->type,
        ];

        Otp::create($otpInputs);

        // send sms or email

        if ($otp->type == 0) {
            // send sms
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo(array('0' . $user->mobile));
            $smsService->setText("مجموعه آمازون \n کد تایید: $otpCode");
            $smsService->setIsFlash(true);
            $messageService = new MessageService($smsService);
        } elseif ($otp->type == 1) {
            // email send

            $emailService = new EmailService();
            $details = [
                'title' => "ایمیل فعال سازی",
                'body' => "کد فعال سازی : {$otpCode}",
            ];
            $emailService->setDetails($details);
            $emailService->setFrom("no-reply@example.com", "example");
            $emailService->setSubject("کد احراز هویت");
            $emailService->setTo($otp->login_identify);
            $messageService = new MessageService($emailService);
        }
        $messageService->send();
        return redirect()->route('auth.customer-login-confirm-form', $token);
    }
}
