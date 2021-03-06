<?php

namespace App\Http\Requests\lotteries;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLotteryRequest extends FormRequest
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
            'name' => 'required|min:3|max:20|unique:lotteries,name,' . $this->lottery->id,
            'description' => 'required|max:255',
            'type' => 'required|in:raffle,lottery',
            'image' => 'image'
        ];
    }
}
