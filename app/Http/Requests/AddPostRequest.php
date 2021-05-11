<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'text' => 'required|min:3',
            'category' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'Należy wypełnić powyższe pole',
            'text.min' => 'Podana treść jest zbyt krótka',
            'category.required' => 'Kategoria nie została wybrana',
        ];
    }
}
