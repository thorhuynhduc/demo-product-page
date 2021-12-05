<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'                 => 'required',
            'brand_id'             => 'required',
            'description'          => 'nullable',
            'delivery'             => 'nullable',
            'warranty_information' => 'nullable',
            'price'                => 'required',
            "images_old"           => "array",
            "images_old.*"         => "string",
            "images"               => "array",
            'images.*'             => 'mimes:jpg,jpeg,png,bmp|max:2000',
        ];
    }
}
