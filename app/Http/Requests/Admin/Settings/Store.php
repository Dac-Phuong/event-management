<?php

namespace App\Http\Requests\Admin\Settings;

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
            "description" => "required",
            "thumbnail" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Tiêu đề không được để trống",
            "description.required" => "Nội dung không được để trống",
            "thumbnail.required" => "Ảnh không được để trống",
            "thumbnail.image" => "Vui lòng chọn 1 ảnh",
            "thumbnail.max" => "Vui lòng chọn ảnh nhỏ hơn 2MB",
        ];
    }
}
