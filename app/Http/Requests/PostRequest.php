<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class PostRequest extends BlogFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'name' => 'required|min:5|max:100',
            'preview_text' => 'required|max:255',
            'detail_text' => 'required',
            'published' => '',
            'slug' => [
                'required',
                'alpha_dash',
                Rule::unique('posts')->ignore(request()->post_id ?? 0)
            ]
        ];

        return $rules;
    }
}
