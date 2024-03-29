<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingDetailsFormRequest extends FormRequest
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
            'lname' => 'string|required',
            'email' => 'email|required',
            'streetname' => 'string|required',
            'postalcode' => 'string|required|max:6',
            'housenmr' => 'numeric|required',
            'housenmradd' => 'string|nullable',
            'order_number' => 'numeric'
        ];
    }
}
