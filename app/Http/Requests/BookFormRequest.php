<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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
            'title' => 'required|max:255|alpha',
            'author'=>'required|max:255|alpha',
            'description' => '',
            'enabled' => '',
            'user_id' => ''
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'title.max' => 'Title length is too long',
            'title.alpha' => 'Title only alphabet',
            'author.required' => 'Author is required!',
            'author.max' => 'Author length is too long',
            'author.alpha' => 'Author only alphabet'
        ];
    }
}
