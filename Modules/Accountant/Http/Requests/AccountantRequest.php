<?php

namespace Modules\Accountant\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class AccountantRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:accountants,email',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|in:activated,deactivated',
            'country' => 'required|string|max:100',
            'academic_qualification' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'experience' => 'required|string|max:500',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'certificate' => 'nullable|file|max:2048|mimes:pdf,doc,docx',
            'user_id' => 'required|exists:users,id',
            'admin_id' => 'nullable|exists:admins,id'
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
