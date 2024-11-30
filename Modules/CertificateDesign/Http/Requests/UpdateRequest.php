<?php

namespace Modules\CertificateDesign\Http\Requests;

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
            'barcode_number' => 'nullable|integer|unique:certificate_designs,barcode_number,id',
            'certificate' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:10240',
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
