<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'min:3', 'max:255'],
            'password' => ['required', 'min:6']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Поле должно быть заполнено',
            'password.required' => 'Поле должно быть заполнено',
            'email.min' => 'Поле должно содержать не менее 3 символов',
            'password.min' => 'Поле должно содержать не менее 6 символов',
            'email.max' => 'Поле должно содержать не более 255 символов'
        ];
    }
}
