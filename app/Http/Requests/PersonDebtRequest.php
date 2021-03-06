<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonDebtRequest extends FormRequest
{
    /**
     * Determine if the person is authorized to make this request.
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
            'value' => ['required', 'numeric']
        ];
    }
}
