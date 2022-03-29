<?php

namespace App\Http\Requests\Auth\Customer;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'identify' => 'required|min:11|max:120|regex:/^[a-zA-Z0-9_.@\+]*$/',
        ];
    }

    public function attributes()
    {
        return [
            'identify' => 'ایمیل یا شماره موبایل'
        ];
    }
}
