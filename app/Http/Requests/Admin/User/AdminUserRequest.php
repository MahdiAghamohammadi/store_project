<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AdminUserRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'first_name' => 'required|max:70|min:2|regex:/^[ا-یa-zA-Z-ء-ي ]+$/u',
                'last_name' => 'required|max:100|min:2|regex:/^[ا-یa-zA-Z-ء-ي ]+$/u',
                'mobile' => 'required|digits:11|unique:users',
                'email' => 'required|string|email|unique:users',
                'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
                'image' => 'nullable|image|mimes:png,jpg,jpeg',
                'activation' => 'required|numeric|in:0,1',
            ];
        } else {
            return [
                'first_name' => 'required|max:70|min:2|regex:/^[ا-یa-zA-Z-ء-ي ]+$/u',
                'last_name' => 'required|max:100|min:2|regex:/^[ا-یa-zA-Z-ء-ي ]+$/u',
                'image' => 'nullable|image|mimes:png,jpg,jpeg',
            ];
        }
    }
}
