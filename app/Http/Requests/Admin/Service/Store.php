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
            "name" => "required",
            "content" => "required",
            "slug" => "required",
            "description" => "required|max:255",
            "thumbnail" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "status" => "required|in:0,1",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Tên dịch vụ không được để trống",
            "content.required" => "Nội dung không được để trống",
            "status.required" => "Trạng thái không được để trống",
            "thumbnail.required" => "Vui lòng chọn 1 ảnh",
            'thumbnail.image' => "Vui lòng chọn 1 ảnh",
            'thumbnail.max' => "Vui lòng chọn ảnh nhỏ hơn 2MB",
            'thumbnail.mimes' => "Vui lòng chọn ảnh có dạng jpeg,png,jpg,gif,svg",
            'description.required'=> "Vui lòng nhập mô tả ngắn",
            'description.max'=> "Mô tả không được lớn hơn 255 kí tự"
        ];
    }
}
