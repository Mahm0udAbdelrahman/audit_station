<?php

namespace Modules\Auth\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class OTPRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'otp' => 'required|exists:o_t_ps,otp',
            'email' => 'required|exists:o_t_ps,email'
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
