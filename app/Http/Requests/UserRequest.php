<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'image' => 'nullable|image',
            'location' => 'nullable|string|max:255',
            'mobile' => 'nullable|numeric',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'about' => 'nullable|string',
        ];
    }
}
