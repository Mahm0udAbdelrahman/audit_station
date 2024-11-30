<?php

namespace Modules\Favorites\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FavoriteRequest extends FormRequest
{



    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'video_id' => 'required|integer|exists:videos,id',
            'course_id' => 'required|integer|exists:Courses,id',
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}
