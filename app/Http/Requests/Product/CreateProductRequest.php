<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'brand_id'             => 'required',
            'name'                 => 'required',
            'description'          => 'nullable',
            'delivery'             => 'nullable',
            'warranty_information' => 'nullable',
            'price'                => 'required',
            "images"               => "required|array|min:1|max:5",
            'images.*'             => 'required|mimes:jpg,jpeg,png,bmp|max:2000',
        ];
    }
}
