<?php

namespace Modules\Question\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Modules\Question\Enums\QuestionTypeEnum;

class StoreRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'type' => ['required', Rule::in(QuestionTypeEnum::availableTypes())],
            'question' => 'required|string|max:1000',
            'is_correct' => 'required|boolean',
            'answer' => 'required|array',
            'answer.*' => 'required|string|max:1000',

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
