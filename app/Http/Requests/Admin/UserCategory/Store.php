<?php

namespace App\Http\Requests\Admin\UserCategory;

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
            'name' => 'required|string|unique:user_categories,name',
            'description' => 'required',
            'is_pin' => 'nullable',
            'status' => 'required|in:1,0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục là trường bắt buộc.',
            'description.required' => 'Mô tả là trường bắt buộc.',
            'status.required' => 'Trạng thái là trường bắt buộc.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'name.unique' => 'Tên ban/bộ phận đã tồn tại.',
        ];
    }
}
