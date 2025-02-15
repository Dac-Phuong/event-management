<?php

namespace App\Http\Requests\Admin\Project;

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
            "category_id" => "required|exists:project_categories,id",
            "title" => "required",
            "slug" => "required",
            "content" => "required",
            "is_pin" => "nullable",
            'url' => 'nullable',
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "is_show" => "nullable",
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Tiêu đề không được để trống",
            "content.required" => "Nội dung không được để trống",
            "category_id.required" => "Danh mục không được để trống",
            "category_id.exists" => "Danh mục không tồn tại",
            'thumbnail.image' => "Vui lòng chọn 1 ảnh",
            'thumbnail.max' => "Vui lòng chọn ảnh nhỏ hơn 2MB",
            'thumbnail.mimes' => "Vui chọn ảnh có dạng jpeg,png,jpg,gif,svg",

        ];
    }
}
