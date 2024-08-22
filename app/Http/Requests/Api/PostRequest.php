<?php

namespace App\Http\Requests\Api;

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
        $id = $this->route('id');
        $rules = [
            'content' => 'nullable',
            'title' => 'nullable|unique:posts,title'. ($id ? ",$id" : ''),
            'description' => 'nullable',
            'category_id' => 'nullable|exists:categories,id',
            'subcat_id' => 'nullable|exists:subcategories,id',
            'status' => 'nullable',
        ];

        return $rules;
    }
}
