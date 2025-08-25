<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
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
    $couponId = $this->route('coupon'); // এখানে id আসবে

    return [
        'name' => 'required|string|max:255|unique:coupons,name,' . $couponId,
        'discount' => 'required|numeric|min:0|max:100',
        'expires_at' => 'nullable|date|after:today',
    ];
}
}
