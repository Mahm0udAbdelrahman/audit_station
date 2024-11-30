<?php

namespace Modules\StepsToBeUnique\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class UpdateRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'number_of_the_step' => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'title' => 'nullable|string|max:500',
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
