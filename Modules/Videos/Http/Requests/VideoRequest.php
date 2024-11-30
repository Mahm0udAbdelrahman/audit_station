<?php

namespace Modules\Videos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
           'title' => 'required|string|max:255',
        'course_id' => 'required|exists:courses,id',
        'video' => 'required|file|mimes:mp4,mov,avi,mkv,jpg,png|max:20480',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
