<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryFormRequest extends FormRequest
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
            'name' => ['required', 'string', Rule::unique('categories')->ignore($this->id)],
            'slug' => ['required', 'string'],
            'description' => ['required', 'string'],
            'photo' => ['nullable'],

            'meta_title' => ['required', 'string'],
            'meta_keywoed' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Category Name',
            'slug' => 'Category Slug',
            'description' => 'Category Description',
            'meta_title' => 'Category Meta Title',
            'meta_keywoed' => 'Category Meta Keywoed',
            'meta_description' => 'Category Meta description',

        ];
    }
}
