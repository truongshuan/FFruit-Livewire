<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'required|min:6|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|min:10|max:11',
            'shipping_address' => 'required|string',
            'note' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không thể trống',
            'min' => ':attribute phải trên :min kí tự',
            'max' => ':attribute phải dưới :max kí tự',
            'email' => ':attribute không hợp lệ',
            'string' => ':attribute phải là một dãy kí tự',
        ];
    }


    public function attributes(): array
    {
        return [
            'customer_name' => 'Họ và tên ',
            'customer_email' => 'Email',
            'customer_phone' => 'Số điện thoại',
            'shipping_address' => 'Địa chỉ nhận hàng',
            'note' => 'Ghi chú'
        ];
    }
}
