<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'login' => 'required|string|max:255',
            'password' => 'required|min:4',
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => 'Please enter login',
            'login.string' => 'Login must be string',
            'login.max' => 'Login must be 255 characters',
            'password.min' => 'Password must be at least 4 characters',
            'password.required' => 'Please enter password'
        ];
    }
}
