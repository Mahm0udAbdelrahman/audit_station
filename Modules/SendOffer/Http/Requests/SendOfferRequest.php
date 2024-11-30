<?php

namespace Modules\SendOffer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class SendOfferRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'sallery' => 'required|numeric|min:0',
            'country' => 'required|string|max:255',
            'date' => 'required|date',
            'type' => 'required|in:fullTime,partTime',
            'description_job' => 'required|string',
            'benefits_job' => 'required|string|max:255',
            'terms_job' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
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
