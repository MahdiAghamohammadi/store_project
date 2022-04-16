<?php

namespace App\Http\Requests\Auth\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class LoginRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $route = Route::current();
        if ($route->getName() == "auth.customer-login-register") {
            return [
                'identify' => 'required|min:11|max:120|regex:/^[a-zA-Z0-9_.@\+]*$/',
            ];
        } elseif ($route->getName() == "auth.customer-login-confirm") {
            return [
                'otp' => 'required|min:6|max:6'
            ];
        }

    }

    public function attributes()
    {
        return [
            'identify' => 'ایمیل یا شماره موبایل',
            'otp' => 'کد تایید'
        ];
    }
}
