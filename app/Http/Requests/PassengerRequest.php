<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassengerRequest extends FormRequest
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
            'booking_id' => 'required|exists:bookings,id',
            'name' => 'required|string|max:255',
            'passport_number' => 'required|string|max:20',
            'passport_expire' => 'required|date|after:today',
            'date_of_birth' => 'required|date',
            'nationality_id' => 'nullable|exists:nationalities,id',
        ];
    }
}
