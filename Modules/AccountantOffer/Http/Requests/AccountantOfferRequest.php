<?php

namespace Modules\AccountantOffer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class AccountantOfferRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [

            'position' => 'required|string|max:255',
            'date' => 'required|date',
            'sallery' => 'required|numeric|min:0',
            'type' => 'required|in:fullTime,partTime',
            'status' => 'required|in:rejected,approved,waitting',
            'accountant_id' => 'required|exists:accountants,id',
            'show' => 'boolean',

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
