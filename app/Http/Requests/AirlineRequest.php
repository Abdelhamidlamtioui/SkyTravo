<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirlineRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ensure you check user permissions as necessary.
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:255',
            'image' => 'required|image',
        ];
    }
}