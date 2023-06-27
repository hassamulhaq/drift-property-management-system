<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TwoFactorVerificationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|string|exists:users,email',
            'two_factor_code' => 'required|string'
        ];
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.*
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator): array
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422));
    }
}
