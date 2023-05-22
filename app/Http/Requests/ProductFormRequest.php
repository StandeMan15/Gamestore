<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'category_id' => 'required',
            'title' => 'string|required',
            'excerpt' => 'string|required',
            'ean_code' => 'numeric|required',
            'body' => 'string|required',
            'price' => 'numeric|required|',
            'discount_price' => 'numeric|nullable',
            'minimum_age' => 'numeric|nullable',
            'release_date' => 'date|nullable',
            'preorder_date' => 'date|nullable',
            //'image' => 'nullable|image|mimes:jpeg,png,jpg'
        ];
    }
}
