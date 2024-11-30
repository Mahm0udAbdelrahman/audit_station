<?php

namespace Modules\Exam\Http\Requests\Exam;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Modules\Exam\Enums\ExamStatusEnum;

class StoreRequest extends FormRequest
{
    use HttpResponse;


    public function rules(): array
    {
        return [
            'exam_name' => 'required|string|max:255',
            'total_grade' => 'required|integer|max:255',
            'mark_of_success' => 'required|integer|max:255',
            'must_be_finished_in_one_sitting' => 'required|string|max:255',
            'exam_duration' => 'required|string|max:255',
            'number_of_questions' => 'required|string|max:255',
            'questions_displayed_per_page' => 'required|string|max:255',
            'question_id' => 'nullable|exists:questions,id|unique:exam_questions,question_id',
            'specialization_question_id' => 'nullable|exists:specialization_questions,id|unique:exam_questions,specialization_question_id',
            'status' => ['required', Rule::in(ExamStatusEnum::availableStatus())],
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
