<?php

namespace App\Http\Requests\Web\Admins;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => 'required|string|unique:permissions,name',
            'description' => 'required|string'
        ];
        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống!',
            'string' => 'Dữ liệu này không phải là chuỗi!',
            'unique' => ':attribute này đã tồn tại!',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên quyền',
            'description' => 'Mô tả',
        ]; 
    }
}
