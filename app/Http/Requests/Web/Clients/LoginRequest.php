<?php

namespace App\Http\Requests\Web\Clients;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'password' => 'required',
            'email' => 'required|email',
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống!',
            'email' => 'Vui lòng nhập đúng định dạng email!',
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => 'Mật khẩu',
            'email' => 'Email'
        ]; 
    }
}
