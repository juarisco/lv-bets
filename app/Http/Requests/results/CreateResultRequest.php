<?php

namespace App\Http\Requests\results;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateResultRequest extends FormRequest
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
            'number' => 'required|numeric|digits:4',
            'series' => 'required|sometimes|numeric|digits:3',
            'published_at' => 'required|date|before:tomorrow',
            'lottery_id' => 'required|exists:lotteries,id',
            // 'lottery_id' => 'required|in:' . $lotteries,
            'time_id' => 'required|sometimes|exists:times,id',
        ];
    }
}
