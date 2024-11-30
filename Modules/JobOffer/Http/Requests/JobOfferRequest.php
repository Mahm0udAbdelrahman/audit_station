<?php

namespace Modules\JobOffer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class JobOfferRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'position' => 'required|string|max:255',
            'date' => 'string',
            'sallary' => 'required|numeric|min:0',
            'country' => 'required|string|max:255',
            'status' => 'required|in:pending,approved,rejected',
            'experience' => 'required|integer|min:0',
            'education' => 'nullable|string|max:255',
            'type' => 'required|in:fullTime,partTime',
            'show' => 'boolean',
            'company_id'=>'required|exists:companies,id'
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
