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
            'brand' => 'nullable',

            'name' => 'required|string',
            'slug' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'small_description' => 'required|string',
            'description' => 'required|string',

            'orginal_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'quantity' => 'nullable',
            'status' => 'nullable',

            'meta_title' => 'required',
            'meta_keywoed' => 'required',
            'meta_description' => 'required',

            'image' => 'nullable'
        ];
    }
}
