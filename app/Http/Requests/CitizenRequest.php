<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitizenRequest extends FormRequest
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
            'cpf' => ['required', 'cpf'],
            'age' => ['required', 'integer'],
            'address' => ['required', 'array'],
            'address.postcode' => ['required', 'string'],
            'address.address' => ['required', 'string'],
            'address.city' => ['required', 'string'],
            'address.state' => ['required', 'string'],
            'source_of_income' => ['required', 'string'],
        ];
    }
}
