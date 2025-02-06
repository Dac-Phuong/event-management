<?php

namespace App\Http\Requests\Admin\Service;

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
            "category_id" => "required|exists:service_categories,id",
            "title" => "required",
            "content" => "required",
            "slug" => "required",
            "thumbnail" => "nullable",
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Tiêu đề không được để trống",
            "content.required" => "Nội dung không được để trống",
            "category_id.required" => "Danh mục không được để trống",
            "category_id.exists" => "Danh mục không tồn tại",
        ];
    }
}
