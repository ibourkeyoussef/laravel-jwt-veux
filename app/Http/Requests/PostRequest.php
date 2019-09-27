<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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


    public function rules()
    {
        return [
            'title'=>['required','string','max:100'],
            'body'=>['required','string','max:255'],
            'image'=>['sometimes'],
            'user_id'=>['required'],
        ];
    }
}
