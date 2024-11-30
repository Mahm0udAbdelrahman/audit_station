<?php

namespace Modules\Course\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class SectionRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'course_id' => 'required|exists:courses,id',
            'section_name' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'course_id.exists' => 'The selected course does not exist.',
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
