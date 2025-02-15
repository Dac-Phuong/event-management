<?php

namespace App\Http\Requests\Client\News;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'keyword' => ['required', 'string', 'max:150', 'regex:/^[\p{L}\p{N}\s]+$/u'],
        ];
    }
    public function messages()
    {
        return [
            'keyword.required' => 'Vui lòng nhập từ khóa',
            'keyword.regex' => 'Từ khóa phải là chữa hoặc chuỗi',
            'keyword.max' => 'Từ khóa quá tìm kiếm dài',
        ];
    }
}
