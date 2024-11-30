<?php

namespace Modules\Exam\Http\Requests\Exam;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Modules\Exam\Enums\ExamStatusEnum;

class UpdateRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'exam_name' => 'nullable|string|max:255',
            'total_grade' => 'nullable|integer|max:255',
            'mark_of_success' => 'nullable|integer|max:255',
            'must_be_finished_in_one_sitting' => 'nullable|string|max:255',
            'exam_duration' => 'nullable|string|max:255',
            'number_of_questions' => 'nullable|string|max:255',
            'questions_displayed_per_page' => 'nullable|string|max:255',
            'question_id' => 'nullable|exists:questions,id',
            'specialization_question_id' => 'nullable|exists:specialization_questions,id',
            'status' => ['nullable', Rule::in(ExamStatusEnum::availableStatus())],
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
