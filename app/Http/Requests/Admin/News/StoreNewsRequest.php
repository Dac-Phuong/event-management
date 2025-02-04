<?php

namespace App\Http\Requests\Admin\News;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            "content" => "required",
            "new_category_id" => "required|exists:news_categories,id",
            "is_pin" => "required",
            "thumbnail" => "nullable",
            "is_show" => "required",
            ...$this->rulesSeo('create'),
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Tiêu đề không được để trống",
            "content.required" => "Nội dung không được để trống",
            "category_id.required" => "Danh mục không được để trống",
            "category_id.exists" => "Danh mục không tồn tại",
            "is_pin.required" => "Trạng thái ghim không được để trống",
            "is_show.required" => "Trạng thái hiển thị không được để trống",
            ...$this->messagesSeo(),
        ];
    }
}
