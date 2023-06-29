<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'name' => ['nullable', 'unique:users,name'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:20'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['required'],
            'password_confirmation' => ['nullable'],
            'remember_token' => ['nullable'],
            'country' => ['required', 'string', 'max:50'],
            'cnic' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'zip' => ['required'],
            'address' => ['required', 'string', 'max:100'],
            'address2' => ['required', 'string', 'max:100'],
            'type' => ['required', 'string'],
            'reference_id' => ['nullable', 'integer'],
            'two_factor_enabled' => ['nullable'],
            'two_factor_code' => ['nullable'],
            'two_factor_expires_at' => ['nullable', 'date'],
            'otp' => ['nullable'],
            'role' => ['required', 'int', 'exists:roles,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
