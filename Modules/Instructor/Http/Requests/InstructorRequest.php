<?php

namespace Modules\Instructor\Http\Requests;
// use App\Http\Requests\InstructorRequest;

use App\Enums\UserTypeEnum;
use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;
use Modules\Instructor\Models\Instructor;

class InstructorRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'admin_id' => 'nullable|exists:admins,id',
            'nationality' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'academic_qualification' => 'required|string',
            'previous_work' => 'required|string|max:500',
            'description' => 'nullable|string',
            'university' => 'required|string|max:255',
            'degree' => 'required|string|max:100',
            'approval_status' => 'required|in:pending,approved,rejected',
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
