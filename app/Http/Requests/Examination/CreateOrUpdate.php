<?php

namespace App\Http\Requests\Examination;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdate extends FormRequest
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
            'patient_card_id' => 'required|integer|min:1|exists:patient_cards,id',
            'name'            => 'nullable|string|min:2|max:255',
            'conclusion'      => 'nullable|string'
        ];
    }
}
