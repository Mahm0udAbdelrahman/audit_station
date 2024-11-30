<?php


namespace Modules\Question\Http\Requests;

namespace Modules\Instructor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Modules\Question\Enums\QuestionTypeEnum;

class ExperienceRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [

            'position' => 'required|string|max:100',
            'experience' => 'required|string|max:500',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'instructor_id' => 'required|exists:instructors,id',
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
