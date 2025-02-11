<?php

namespace App\Http\Requests\Admin\News;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    use RequestTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            "id" => "required|exists:news,id",
            "title" => "required",
            "content" => "required",
            "new_category_id" => "required|exists:news_categories,id",
            "is_pin" => "nullable",
            "slug" => "required",
            "thumbnail" => "nullable",
            "is_show" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            "id.required" => "ID bài viết không được bỏ trống",
            "id.exists" => "ID bài viết không tồn tại",
            "title.required" => "Tiêu đề không được để trống",
            "content.required" => "Nội dung không được để trống",
            "new_category_id.required" => "Danh mục không được để trống",
            "new_category_id.exists" => "Danh mục không tồn tại",
            "is_show.required" => "Trạng thái hiển thị không được để trống",
        ];
    }
}
