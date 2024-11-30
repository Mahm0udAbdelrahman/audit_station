<?php

namespace Modules\Exam\Http\Requests\Answer;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class StoreRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'exam_id' => 'required|exists:exams,id',
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required|exists:answers,id',
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
