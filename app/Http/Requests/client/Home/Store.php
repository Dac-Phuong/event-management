<?php

namespace App\Http\Requests\client\Home;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    use RequestTrait;
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
            "fullname" => "required|max:40",
            "phone" => "required|numeric|digits_between:10,11",
            "email" => "required|email",
            "business_name" => "nullable|max:100",
        ];
    }

    public function messages(): array
    {
        return [
            "fullname.required" => "Vui lòng nhập họ tên",
            "fullname.max" => "Họ tên quá dài",
            "phone.required" => "Vui lòng nhập điện thoại",
            "phone.numeric" => "Điện thoại phải là số",
            "phone.digits_between" => "Điện thoại phải có 10 hoặc 11 số",
            "email.required" => "Vui lòng nhập email",
            "email.email" => "Email không đúng định dạng",
            "business_name.max" => "Tên doanh nghiệp quá dài",
        ];
    }
}
