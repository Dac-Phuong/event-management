<?php

namespace App\Http\Requests\Admin\CategoryService;

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
            'id' => 'required|exists:service_categories,id',
            'name' => 'required|string',
            'slug' => 'required|string|unique:service_categories,slug,' . $this->id . ',id',
            'status' => 'required|in:1,0',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Vui lòng chọn danh mục',
            'id.exists' => 'Danh mục không tồn tại',
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.string' => 'Tên danh mục không hợp lệ',
            'slug.required' => 'Vui lòng nhập slug',
            'slug.string' => 'Slug không hợp lệ',
            'slug.unique' => 'Slug đã tồn tại',
            'status.required' => 'Vui lòng chọn trạng thái',
            'status.in' => 'Trạng thái không hợp lệ',
        ];
    }
}
