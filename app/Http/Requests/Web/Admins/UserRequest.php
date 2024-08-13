<?php

namespace App\Http\Requests\Web\Admins;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'user_name' => 'required|string',
            'role_id' => 'required|exists:roles,id',
            'status' => 'nullable|in:active,inactive,disabled',
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống!',
            'email' => 'Vui lòng nhập đúng định dạng email!',
            'unique' => ':attribute này đã tồn tại!',
            'string' => 'Trường này phải là 1 chuỗi!',
            'exists' => 'Trường này dữ liệu không tồn tại!',
            'in' => 'Dữ liệu không phù hợp'
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'user_name' => 'Tên người dùng',
            'role_id' => 'Vai trò',
            'status' => 'Trạng thái'
        ]; 
    }

}
