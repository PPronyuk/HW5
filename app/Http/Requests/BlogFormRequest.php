<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function messages()
    {
        return ['required' => 'Поле обязательно для заполнения',
                'email' => 'Введите корректный email адрес',
                'alpha_dash' => 'Может состоять только из A-Z a-z 0-9 и символов _-',
                'min' => ['string' => 'Минимальное количество символов :min'],
                'max' => ['string' => 'Максимальное количество символов :max'],
                'unique' => 'Данное значение уже используется, выберите другое',
            ];
    }
}
