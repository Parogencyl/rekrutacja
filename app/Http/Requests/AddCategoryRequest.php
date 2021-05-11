<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'name' => 'required|max:50|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Należ podać nazwę kategorii',
            'name.max' => 'Maksymalna liczba znaków wynosi: :max',
            'name.unique' => 'Taka kategoria już istnieje',
        ];
    }
}
