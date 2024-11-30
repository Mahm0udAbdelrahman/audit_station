<?php

namespace Modules\Interviewerr\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class InterviewerrRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:interviewerrs',
            'status' => 'required|in:activated,deactivated',
            'show' => 'required|in:0,1',
            'permission' => 'required|string',
            'phone' => 'nullable|string',
            'country' => 'nullable|string',
            'level_education' => 'nullable|string',
            'certificate' => 'nullable|file||mimes:png,jpg,pdf',
            'user_id' => 'required|exists:users,id',
            'admin_id' => 'nullable|exists:admins,id',

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
