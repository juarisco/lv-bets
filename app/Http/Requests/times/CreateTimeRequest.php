<?php

namespace App\Http\Requests\times;

use Illuminate\Foundation\Http\FormRequest;

class CreateTimeRequest extends FormRequest
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
            'number_time' => 'required|numeric|digits:1|gt:0|unique:times',
            'alias' => 'required|alpha|min:3|unique:times',
            'description' => 'required|max:255',
        ];
    }
}
