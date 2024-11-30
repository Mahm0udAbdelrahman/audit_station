<?php

namespace Modules\Interviewerr\Http\Requests;

use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Modules\Interviewerr\Enums\InterviewerrTypeEnum;

class UpdateAvailabilityRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'interviewer_id' => 'sometimes|exists:interviewerrs,id',
            'from_time' => 'sometimes|date_format:h:i:s',
            'time_to' => 'sometimes|date_format:h:i:s|after:from_time',
            'notes' => 'nullable|string|max:150',
            'description' => 'nullable|string|max:500',
            'to_job' => 'required|string|max:255',
            'type' => 'nullable|integer|in:' . implode(',', [InterviewerrTypeEnum::Accepte, InterviewerrTypeEnum::Rejected]),
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
