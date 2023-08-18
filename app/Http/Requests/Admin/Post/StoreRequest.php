<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'category_id' => ['sometimes', 'exists:categories,id'],
            'tag_ids' => ['nullable', 'array'],
            'tag_ids.*' => ['nullable', 'exists:tags,id'],
            'preview_image' => ['sometimes'],
            'image' => ['sometimes'],

        ];
    }

//    public function messages()
//    {
//        return [
//            'title.required' =>
//        ];
//    }
}
