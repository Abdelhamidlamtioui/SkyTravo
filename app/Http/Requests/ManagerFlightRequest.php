<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerFlightRequest extends FormRequest
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
            'origin_airport_id' => 'required|exists:airports,id',
            'destination_airport_id' => 'required|exists:airports,id',
            'departure_at' => 'required|date',
            'arrival_at' => 'required|date|after_or_equal:departure_at',
            'economy_price' => 'nullable|numeric',
            'premium_economy_price' => 'nullable|numeric',
            'business_class_price' => 'nullable|numeric',
            'first_class_price' => 'nullable|numeric',
            'economy_seats' => 'required|integer|min:0',
            'premium_economy_seats' => 'required|integer|min:0',
            'business_class_seats' => 'required|integer|min:0',
            'first_class_seats' => 'required|integer|min:0',
            'flight_duration' => 'nullable|string',
        ];
    }
}
