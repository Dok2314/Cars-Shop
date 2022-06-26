<?php

namespace App\Http\Requests\Cars;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'mark' => ['required', 'min:3', 'max:255'],
            'category_id' => ['required'],
            'small_description' => ['required'],
            'gallery' => ['array', 'max:5'],
            'description' => ['required','min:10', 'max:500'],
            'old_price' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле должно быть заполнено',
            'mark.required' => 'Поле должно быть заполнено',
            'category_id.required' => 'Поле должно быть заполнено',
            'small_description.required' => 'Поле должно быть заполнено',
            'description.required' => 'Поле должно быть заполнено',
            'gallery.array' => 'Поле должно быть массивом',
            'gallery.max' => 'Поле должно содержать максимум 5 изображений',
            'old_price.required' => 'Поле должно быть заполнено',
            'title.min' => 'Поле должно содержать не менее 3 символов',
            'mark.min' => 'Поле должно содержать не менее 3 символов',
            'description.min' => 'Поле должно содержать не менее 10 символов',
            'title.max' => 'Поле должно содержать не более 255 символов',
            'mark.max' => 'Поле должно содержать не более 255 символов',
            'description.max' => 'Поле должно содержать не более 500 символов'
        ];
    }
}
