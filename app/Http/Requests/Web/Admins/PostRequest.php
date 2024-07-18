<?php

namespace App\Http\Requests\Web\Admins;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'content' => 'required',
            'title' => 'required|unique:posts,title',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'subcat_id' => 'required|exists:subcategories,id',
            'status' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,webp,png|max:2048'
        ];

        return $rules;
    }

    public function messages() {
        return [
            'required' => ':attribute không được để trống!',
            'max' => ':attribute không được lớn hơn :max ký tự!',
            'unique' => ':attribute này đã tồn tại!',
            'exists' => ':attribute này không tồn tại!',
            'image' => 'Tệp này không phải là ảnh!',
            'mines' => 'Chỉ nhập những ảnh có dạng jpg, jpeg, webp, png'
        ];
    }

    public function attributes() {
        return [
            'content' => 'Nội dung',
            'description' => 'Mô tả',
            'title' => 'Tiêu đề',
            'category_id' => 'Danh mục',
            'subcat_id' => 'Danh mục con',
            'status' => 'Trạng thái',
            'image' => 'Ảnh'
        ];
    }
}
