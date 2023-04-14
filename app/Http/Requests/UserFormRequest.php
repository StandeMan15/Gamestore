<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'fname' => 'string|required',
            'mname' => 'string|nullable',
            'lname' => 'string|required',
            'streetname' => 'string|required',
            'housenmr' => 'string|required',
            'housenmr_extra' => 'string|nullable',
            'email' => 'email|required',
            'postalcode' => 'regex:/^\d{4}[A-Z]{2}$/'
        ];
    }
}
