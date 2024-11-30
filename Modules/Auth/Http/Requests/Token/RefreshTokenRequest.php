<?php

namespace Modules\Auth\Http\Requests\Token;

use App\Helpers\ValidationRuleHelper;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class RefreshTokenRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'token' => ValidationRuleHelper::stringRules(),
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

