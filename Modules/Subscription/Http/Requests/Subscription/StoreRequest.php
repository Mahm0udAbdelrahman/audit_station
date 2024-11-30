<?php

namespace Modules\Subscription\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Modules\Subscription\Enums\SubscriptionStatusEnum;

class StoreRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'amount_by_dollar' => 'required|string|max:255',
            'amount_by_coins' => 'required|string|max:255',
            'status' => ['required', Rule::in(SubscriptionStatusEnum::availableTypes())],
            'items' => 'required|array',
            'items.*' => 'required|string|exists:items,id',

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
