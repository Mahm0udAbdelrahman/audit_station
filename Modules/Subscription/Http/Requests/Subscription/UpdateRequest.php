<?php

namespace Modules\Subscription\Http\Requests\Subscription;

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
            'name' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'amount_by_dollar' => 'nullable|string|max:255',
            'amount_by_coins' => 'nullable|string|max:255',
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
