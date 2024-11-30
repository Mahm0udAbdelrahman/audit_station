<?php

namespace Modules\Auth\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Modules\Auth\Enums\UserStatusEnum;
use Modules\Auth\Enums\UserTypeEnum;

class UpdateRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|min:11|numeric',
            'role' => 'nullable|exists:roles,name',
            'image' => 'nullable|image',
            'type' =>  ['nullable', Rule::in(UserTypeEnum::ADMIN_EMPLOYEE)],
            'status' => ['nullable', Rule::in(UserStatusEnum::availableTypes())],
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
