<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidityRequest extends FormRequest
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
            'type' => 'required|unique:validities,type,' . $this->validity,
            'years' => 'required',
            'price_total' => 'required',
            'price_partner' => 'required'
        ];
    }
}
