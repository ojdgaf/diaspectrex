<?php

namespace App\Http\Requests\Hospital;

use App\Http\Requests\Rules;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        return array_merge(
            [
                'name'        => 'required|string|min:2|max:255|bail',
                'description' => 'nullable|string|bail'
            ],
            Rules::getAddressRules(),
            Rules::getPhonesRules()
        );
    }

    /**
     * Throws exception as response if validation is failed.
     *
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'data' => [
                'success' => false,
                'message' => $validator->errors()->first()
            ]
        ]));
    }
}
