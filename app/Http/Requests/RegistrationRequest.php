<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:2', 'max:50'],
            'surname' => ['required', 'min:3', 'max:40'],
            'phone' => ['required', 'integer'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'min:6']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле должно быть заполнено',
            'surname.required' => 'Поле должно быть заполнено',
            'phone.required' => 'Поле должно быть заполнено',
            'email.required' => 'Поле должно быть заполнено',
            'password.required' => 'Поле должно быть заполнено',
            'name.min' => 'Поле должно содержать минимум 2 символа',
            'surname.min' => 'Поле должно содержать минимум 3 символа',
            'password.min' => 'Поле должно содержать минимум 6 символа',
            'name.max' => 'Поле должно содержать не более 50 символов',
            'surname.max' => 'Поле должно содержать не более 40 символов',
            'phone.integer' => 'Поле должно содержать только цифры',
            'email.email' => 'Поле должно быть электронным адресом',
            'email.unique' => 'Пользователь с таким эл. адресом уже существует'
        ];
    }
}
