<?php

namespace App\Http\Requests\Admin\Recruitment;

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
            "title" => "required",
            "slug" => "required|unique:recruitments,slug",
            "description" => "required",
            "status" => "required",
            "number" => "required|numeric",
            "expired_at" => "required",
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Tiêu đề không được để trống",
            "slug.required" => "Slug không được để trống",
            "status.required" => "Vui lòng chọn 1 trạng thái",
            "slug.unique" => "Slug đã tồn tại",
            "expired_at.required" => "Ngày kết thúc không được để trống",
            "number.required" => "Số lượng không để trống",
            "number.numeric" => "Số lượng phải là số",
            "thumbnail.required" => "Vui lòng chọn 1 ảnh",
            "thumbnail.image" => "Vui lòng chọn 1 ảnh",
            "thumbnail.max" => "Vui lòng chọn ảnh nhỏ hơn 2MB",
            "description.required" => "Mô tả không được để trống",
        ];
    }
}
