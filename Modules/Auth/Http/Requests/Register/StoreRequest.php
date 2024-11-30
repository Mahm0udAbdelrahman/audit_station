<?php

namespace Modules\Auth\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;


class StoreRequest extends FormRequest
{
    use HttpResponse;


    public function rules(): array
    {
        return
        [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|min:11|numeric|unique:users,phone',
            'image' => 'nullable|image',

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
