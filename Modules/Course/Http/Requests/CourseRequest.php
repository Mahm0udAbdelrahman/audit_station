<?php

namespace Modules\Course\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Modules\Course\Enums\CertificationsEnum;
use Modules\Course\Enums\SkillLevelEnum;

class CourseRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'instructor_name' => 'required|string',
            'course_name' => 'required|string',
            'price' => 'required|numeric',
            'percentage' => 'sometimes|integer|min:1|max:180',
            'category_id' => 'sometimes|exists:categories,id',
            'language_id' => 'sometimes|exists:languages,id',
            'instructor_id' => 'required|exists:instructors,id',
            'description' => 'required|string|max:500',
            'date' => 'required|date_format:Y-m-d',
            'duration' => 'sometimes|integer|min:1|max:30',

            'level' => 'nullable|integer|in:' . implode(',', [
                SkillLevelEnum::Beginner,
                SkillLevelEnum::Intermediate,
                SkillLevelEnum::Expert
            ]),
            'certifications' => 'nullable|integer|in:' . implode(',', [
                CertificationsEnum::YES,
                CertificationsEnum::NO
            ])
        ];

    }


     /**
     * @throws ValidationException
     */
    public function failedValidation(Validator $validator): void
    {
        $this->throwValidationException($validator);
    }
}
