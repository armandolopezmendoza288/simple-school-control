<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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

            'name' => 'required|min:3|max:15|regex:/^[a-zA-Z\s]+$/u',
            'username' => 'required|unique:users|min:3|max:15|',
            'email' => 'required|email|unique:users',
            'tipo' => 'required|in:1,2',
            'password' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido'
        ];
    }
}
