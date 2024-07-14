<?php

namespace App\Http\Requests\Web\Admins;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
{
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
        $rules = [
            'name' => 'required|max:255|unique:subcategories,name',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];

        return $rules;
    }

    public function messages() {
        return [
            'required' => ':attribute không được để trống!',
            'max' => ':attribute không được lớn hơn :max ký tự!',
            'unique' => ':attribute này đã tồn tại!',
            'exists' => ':attribute này không tồn tại!'
        ];
    }

    public function attributes() {
        return [
            'name' => 'Tên danh mục con',
            'description' => 'Mô tả',
            'category_id' => 'Tên danh mục'
        ];
    }
}
