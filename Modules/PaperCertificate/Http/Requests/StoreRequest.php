<?php

namespace Modules\PaperCertificate\Http\Requests;

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
            'link' => [
                'required',
                'string',
                'regex:/^https:\/\/wa\.me\/[0-9]+$/'
            ],
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
