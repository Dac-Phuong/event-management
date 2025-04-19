<?php

namespace App\Http\Requests\Admin\Locations;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
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
            "name" => "required|string|max:255|unique:location_maps,name",
        ];
    }
    public function messages(): array
    {
        return [
            "name.required" => "Tên tỉnh thành không được để trống",
            "name.string" => "Tên tỉnh thành không đúng định dạng",
            "name.max" => "Tên tỉnh thành không được quá 255 ký tự",
            "name.unique" => "Tên tỉnh thành đã tồn tại",
        ];
    }

}
