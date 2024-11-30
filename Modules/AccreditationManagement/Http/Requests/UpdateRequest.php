<?php

namespace Modules\AccreditationManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class UpdateRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return
        [
            'grade'          => 'nullable|string|max:100',
            'minimum_degree' => 'nullable|string|max:100',
            'maximum_degree' => 'nullable|string|max:100',
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
