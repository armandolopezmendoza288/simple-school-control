<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        $user = $this->route('user');
        return [
            'name' => 'required|min:3|max:15|regex:/^[a-zA-Z\s]+$/u',
            'username' => 'unique:users,username,'.$this->user.'|required',
            /* 'username' => ['required', 'unique:users,username,' . $user->id],
            'email' => [
                'required', 'unique:users,email,' . request()->route('user')->id
            ], */
            'tipo' => 'required|in:1,2',
            'password' => 'sometimes',

        ];
    }
}
