<?php

namespace Modules\Reviews\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'reviewable_type' => 'required|string',
            'reviewable_id' => 'required|integer',
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'course_name' => 'required|string|max:255',
            'date' => 'required|date',
            'review' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5',
            'approval_status' => 'in:pending,approved,rejected'
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
