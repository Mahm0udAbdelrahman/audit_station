<?php

namespace Modules\Auth\Http\Requests\Password;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class ResetPasswordRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'otp' => 'required|exists:o_t_ps,otp',
            'password' => 'required|confirmed|min:8',
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
