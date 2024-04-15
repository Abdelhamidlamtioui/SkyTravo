<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'depart_flight_id' => 'required|exists:flights,id',
            'return_flight_id' => 'nullable|exists:flights,id',
            'flight_type_id' => 'required|exists:flight_types,id',
            'total_price' => 'nullable|numeric',
            'payment_response' => 'nullable|string',
            'status' => 'required|string|in:pending,confirmed,cancelled',
        ];
    }
}
