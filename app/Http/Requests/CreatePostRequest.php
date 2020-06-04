<?php

namespace App\Http\Requests;

class CreatePostRequest extends BlogFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['slug' => 'required|alpha_dash|unique:posts',
                'name' => 'required|min:5|max:100',
                'preview_text' => 'required|max:255',
                'detail_text' => 'required',
                'published' => ''
        ];
    }
}
