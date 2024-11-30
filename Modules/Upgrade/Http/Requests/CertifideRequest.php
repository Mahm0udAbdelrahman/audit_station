<?php

namespace Modules\Upgrade\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class CertifideRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'education_qualifications' => 'required|string|max:255',
            'university_name' => 'required|string|max:255',
            'degree_title' => 'required|string|max:255',
            'GPA' => 'required|integer|between:0,100',
            'year_of_graduation' => 'required|date',
            'certificate_name' => 'required|string|max:255',
            'certificate_type' => 'required|string|max:255',
            'source_of_certificate' => 'required|string|max:255',
            'courses_name' => 'required|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'company_name' => 'required|string|max:255',
            'company_title' => 'required|string|max:255',
            'company_location' => 'required|string|max:255',
            'start_date' => 'required|datedate_format:Y-m-d',
            'end_date' => 'required|date|date_format:Y-m-d|after:start_date',
            'user_id' => 'required|exists:users,id',
            'certificate' => 'required|file|mimes:jpeg,png,jpg,gif',
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
