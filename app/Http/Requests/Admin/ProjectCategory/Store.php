<?php

namespace App\Http\Requests\Admin\ProjectCategory;

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
            'name' => 'required|string',
            'slug' => 'required|string|unique:project_categories,slug',
            'status' => 'required|in:1,0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.string' => 'Tên danh mục phải là một chuỗi',
            'slug.required' => 'Slug không được để trống',
            'slug.string' => 'Slug phải là một chuỗi',
            'slug.unique' => 'Slug đã tồn tại',
            'status.required' => 'Trạng thái không được để trống',
            'status.in' => 'Trạng thái phải là số 0 hoặc 1',
        ];
    }
}
