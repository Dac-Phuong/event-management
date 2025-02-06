<?php

namespace App\Http\Requests\Admin\Service;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

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
            "id" => "required|exists:services,id",
            "title" => "required",
            "content" => "required",
            "category_id" => "required|exists:service_categories,id",
            "slug" => "required",
            "thumbnail" => "nullable",
        ];
    }

    public function messages(): array
    {
        return [
            "id.required" => "ID bài viết không được bỏ trống",
            "id.exists" => "ID bài viết không tồn tại",
            "title.required" => "Tiêu đề không được để trống",
            "content.required" => "Nội dung không được để trống",
            "category_id.required" => "Danh mục không được để trống",
            "category_id.exists" => "Danh mục không tồn tại",
        ];
    }
}
