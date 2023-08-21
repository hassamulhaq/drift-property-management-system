<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class LowerLevelUsersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['required'],
            'password_confirmation' => ['nullable'],
            'remember_token' => ['nullable'],
            'first_name' => ['nullable'],
            'last_name' => ['nullable'],
            'phone' => ['nullable'],
            'country' => ['nullable'],
            'cnic' => ['nullable'],
            'city' => ['nullable'],
            'state' => ['nullable'],
            'zip' => ['nullable'],
            'address' => ['nullable'],
            'address2' => ['nullable'],
            'type' => ['nullable'],
            'reference_id' => ['nullable', 'integer'],
            'two_factor_enabled' => ['required'],
            'two_factor_code' => ['nullable'],
            'two_factor_expires_at' => ['nullable', 'date'],
            'otp' => ['nullable'],
            'parent_id' => ['nullable', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
