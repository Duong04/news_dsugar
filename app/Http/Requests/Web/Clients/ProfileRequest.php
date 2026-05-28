<?php

namespace App\Http\Requests\Web\Clients;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        'email' => 'nullable|email|unique:customers,email,'.$id,
        'user_name' => 'nullable|string',
        'phone' => 'nullable|max:10',
        'address' => 'nullable|string',
        'first_name' => 'nullable|string',
        'last_name' => 'nullable|string',
        'avatar' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:51200'
    ];
    
    return $rules;
}

public function messages(): array
{
    return [
        'max' => ':attribute không được lớn hơn :max ký tự!',
        'unique' => ':attribute này đã tồn tại!',
        'string' => 'Trường này phải là 1 chuỗi!',
        'image' => ':attribute phải là 1 file ảnh',
        'mimes' => 'Vui lòng nhập đúng định dạng jpg,png,jpeg,webp'
    ];
}

public function attributes(): array
{
    return [
        'email' => 'Email',
        'user_name' => 'Tên người dùng',
        'phone' => 'Số điện thoại',
        'address' => 'Địa chỉ',
        'first_name' => 'Tên',
        'last_name' => 'Họ',
        'avatar' => 'Ảnh đại diện'
    ]; 
}
}
