<?php

namespace Modules\PaymentMethod\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Modules\PaymentMethod\Enums\PaymentMethodStatusEnum;

class StoreRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'payout_account' => 'required|string|max:255',
            'holder_name' => 'required|string|max:255',
            'card_number' => 'required|integer',
            'cvv' => 'required|integer',
            'expire_date' => 'required',
            'status' => ['required', Rule::in(PaymentMethodStatusEnum::availableTypes())],

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
