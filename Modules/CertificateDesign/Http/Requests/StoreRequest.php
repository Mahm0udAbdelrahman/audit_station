<?php

namespace Modules\CertificateDesign\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'barcode_number' => 'required|integer|unique:certificate_designs,barcode_number,id',
            'certificate' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:10240',
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
