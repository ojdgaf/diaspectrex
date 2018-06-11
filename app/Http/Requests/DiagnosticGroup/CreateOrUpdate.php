<?php

namespace App\Http\Requests\DiagnosticGroup;

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
            'name'            => 'required|string|min:2|max:255|bail',
            'display_name'    => 'required|string|min:2|max:255|bail',
            'patient_type_id' => 'required|integer|exists:patient_types,id',
            'description'     => 'nullable|string|bail',
        ];
    }
}
