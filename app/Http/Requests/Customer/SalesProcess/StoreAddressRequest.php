<?php

namespace App\Http\Requests\Customer\SalesProcess;

use App\Rules\PostalCode;
use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|min:1|max:300',
            'postal_code' => ['required', new PostalCode()],
            'no' => 'required',
            'unit' => 'required',
            'receiver' => 'sometimes',
            'recipient_first_name' => 'required_with:receiver',
            'recipient_last_name' => 'required_with:receiver',
            'mobile' => 'required_with:receiver',
        ];
    }

    public function attributes()
    {
        return [
            'unit' => 'واحد',
            'mobile' => 'موبایل گیرنده',
            'recipient_first_name' => 'نام گیرنده',
            'recipient_last_name' => 'نام خانوادگی گیرنده',
        ];
    }

    public function messages()
    {
        return [
            "required_with" => ":attribute الزامی است زمانی که :values خودتان نیستید.",
        ];
    }
}
