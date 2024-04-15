<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|string|max:255|unique:coupons',
            'discount' => 'required|string|max:255',
            'discount_type' => 'required|string|max:255',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date',
        ];
    }
}