<?php

namespace Modules\Comments\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Blogs\Models\Blog;

class CommentRequest extends FormRequest
{


    public function rules(): array
    {
        $blogId = Blog::inRandomOrder()->first()->id ?? 1;
        return [
            'commentable_type' => 'required|string',
            'commentable_id' => 'required|exists:blogs,id',
            'content' => 'required|string|max:255',
            'blog_id' => 'required|exists:blogs,id',
            'user_id' => 'required|exists:users,id',
            'parent_id' => 'nullable|exists:comments,id',
        ];

    }



    public function authorize(): bool
    {
        return true;
    }
}


