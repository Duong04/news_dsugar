<?php

namespace App\Http\Requests\Web\Clients;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:7',
            'confirm_psw' => 'required|same:password',
            'user_name' => 'required|max:255'
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống!',
            'min' => ':attribute không được nhỏ hơn :min ký tự!',
            'max' => ':attribute không được lớn hơn :max ký tự!',
            'unique' => ':attribute này đã tồn tại!',
            'email' => 'Vui lòng nhập đúng định dạng email!',
            'same' => ':attribute không trùng khớp với mật khẩu!',
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => 'Mật khẩu',
            'user_name' => 'Tên người dùng',
            'confirm_psw' => 'Xác nhận mật khẩu',
            'email' => 'Email'
        ]; 
    }
}
