<?php

namespace Modules\Padge\Http\Requests;

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
            'title' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'color_id' => 'nullable|exists:colors,id',
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
