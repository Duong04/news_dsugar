<?php

namespace App\Http\Requests\Web\Admins;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id = $this->route('id');

        $rules = [
            'name' => 'required|max:255|unique:categories,name',
            'description' => 'required',
        ];

        if (!$id) {
            $rules['image'] = 'required|image|mimes:jpg,jpeg,webp,png|max:2048';
        }

        if ($id) {
            $rules['image'] = 'image|mimes:jpg,jpeg,webp,png|max:2048';
            $rules['name'] .=','. $id;
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống!',
            'max' => ':attribute không được lớn hơn :max ký tự!',
            'unique' => ':attribute này đã tồn tại!',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên danh mục',
            'description' => 'Mô tả',
        ]; 
    }
}
