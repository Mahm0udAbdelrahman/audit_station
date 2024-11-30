<?php

namespace Modules\Blogs\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsRequest extends FormRequest
{



    public function rules(): array
    {
        return [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'share' => 'nullable|url',
            'tags' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
        ];
    }




    public function authorize(): bool
    {
        return true;
    }
}
