<?php

namespace App\Http\Requests\Admin\Recruitment;

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
            "id" => "required|exists:recruitments,id",
            "title" => "required",
            "slug" => "required|unique:recruitments,slug," . $this->id,
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "expired_at" => "required",
            "number" => "required",
            "status" => "required",
            "description" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            "id.required" => "ID bài viết không được bỏ trống",
            "id.exists" => "ID bài viết không tồn tại",
            "title.required" => "Tiêu đề không được để trống",
            "slug.required" => "Slug không được để trống",
            "slug.unique" => "Slug đã tồn tại",
            "status.required" => "Vui lòng chọn 1 trạng thái",
            "expired_at.required" => "Ngày kết thúc không được để trống",
            "number.required" => "Số lượng không để trống",
            "number.numeric" => "Số lượng phải là số",
            "description.required" => "Mô tả không được để trống",
            "thumbnail.image" => "Vui lòng chọn 1 ảnh",
            "thumbnail.max" => "Vui lòng chọn ảnh nhỏ hơn 2MB",
        ];
    }
}
