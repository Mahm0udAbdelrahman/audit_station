<?php

namespace Modules\Auth\Http\Requests\Password;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class ChangePasswordRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'current_password' => 'required',
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