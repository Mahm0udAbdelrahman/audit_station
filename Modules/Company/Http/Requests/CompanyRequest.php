<?php

namespace Modules\Company\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class CompanyRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',

            'status' => 'in:activated,deactivated',
            'show' => 'boolean',
            'phone' => 'required|string|max:15',
            'position' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'companyAddress' => 'required|string|max:255',
            'certificate' => 'nullable|file|mimes:png,jpg,pdf|max:2048',
            'accountant_id'=>'required|exists:accountants,id'
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
