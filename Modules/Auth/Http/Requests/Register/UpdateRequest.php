<?php

namespace Modules\Auth\Http\Requests\Register;

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
            'type' =>  ['nullable', Rule::in(UserTypeEnum::getLabel(1))],
            'status' => ['nullable', Rule::in(UserStatusEnum::availableTypes())],
            'age' => 'nullable|integer',
            'gender' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'payout_account' => 'nullable|string|max:255',
            'holder_name' => 'nullable|string|max:255',
            'card_number' => 'nullable|integer',
            'cvv' => 'nullable|integer',
            'expire_date' => 'nullable',
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
