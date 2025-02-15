<?php

namespace App\Http\Requests\Admin\User;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
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
            'id' => 'required|exists:users,id',
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->id],
            'phone' => ['required', 'numeric', 'unique:users,phone,' . $this->id],
            'password' => 'nullable|min:6',
            'status' => 'required',
            'role' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email trường bắt buộc.',
            'email.email' => 'Email phải là địa chỉ email hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'name.required' => 'Tên là trường bắt buộc.',
            'phone.required' => 'Số điện thoại là trường bắt buộc.',
            'phone.numeric' => 'Số điện thoại phải là số.',
            'role.required' => 'Vai trò là trường bắt buộc.',
            'status.required' => 'Trạng thái là trường bắt buộc.',
            'phone.unique' => 'Số điện thoại đã tồn tại.',
        ];
    }
}
