<?php

namespace Modules\SpecializationQuestion\Http\Requests;

use App\Traits\HttpResponse;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Modules\SpecializationQuestion\Enums\SpecializationTypeEnum;

class UpdateRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [

            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'sub_sub_category' => 'nullable|string|max:255',
            'is_correct' => 'required|boolean',
            'type' => ['nullable', Rule::in(SpecializationTypeEnum::availableTypes())],
            'question' => 'nullable|string|max:500',
            'specialization_answer' => 'nullable|array',
            'specialization_answer.*' => 'nullable|string|max:500',

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
