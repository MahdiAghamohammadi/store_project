<?php

namespace App\Http\Requests\Customer\Profile;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'subject' => 'required|min:2|max:100|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
            'description' => 'required|min:2|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
            'category_id' => 'required|min:1|regex:/^[0-9]+$/u|exists:ticket_categories,id',
            'priority_id' => 'required|min:1|regex:/^[0-9]+$/u|exists:ticket_priorities,id',
        ];
    }
}
