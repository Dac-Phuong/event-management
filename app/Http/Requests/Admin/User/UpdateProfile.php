<?php

namespace App\Http\Requests\Admin\User;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:user_categories,id',
            'education' => ['required', 'string'],
            'experience' => ['required', 'string'],
            'philosophy' => 'required',
            'content' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Ban/bộ phận là trường bắt buộc.',
            'category_id.exists' => 'Ban/bộ phận không tồn tại.',
            'education.required' => 'Học vấn trường bắt buộc.',
            'experience.required' => 'Kinh nghiệm là trường bắt buộc.',
            'philosophy.required' => 'Triết lý là trường bắt buộc.',
            'avatar.image' => 'Vui lý chọn 1 ảnh.',
            'avatar.max' => 'Ảnh phải_nhỏ 2048kb.',
            'content.required' => 'Nội dung là trường bắt buộc.',
        ];
    }
}
