<?php

namespace Modules\SpecializationQuestion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Modules\SpecializationQuestion\Enums\SpecializationTypeEnum;

class StoreRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [

            'sub_category_id' => 'required|exists:sub_categories,id',
            'sub_sub_category' => 'nullable|string|max:255',
            'is_correct' =>'required|boolean',
            'type' => ['required', Rule::in(SpecializationTypeEnum::availableTypes())],
            'question' => 'required|string|max:500',
            'specialization_answer' => 'required|array',
            'specialization_answer.*' => 'required|string|max:500',

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
