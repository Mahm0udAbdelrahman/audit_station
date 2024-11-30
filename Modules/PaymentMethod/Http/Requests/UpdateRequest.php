<?php

namespace Modules\PaymentMethod\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Modules\PaymentMethod\Enums\PaymentMethodStatusEnum;

class UpdateRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'payout_account' => 'nullable|string|max:255',
            'holder_name' => 'nullable|string|max:255',
            'card_number' => 'nullable|integer',
            'cvv' => 'nullable|integer',
            'expire_date' => 'nullable',
            'status' => ['nullable', Rule::in(PaymentMethodStatusEnum::availableTypes())],
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
