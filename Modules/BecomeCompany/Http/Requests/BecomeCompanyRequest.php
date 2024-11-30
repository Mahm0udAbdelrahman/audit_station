<?php

namespace Modules\BecomeCompany\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class BecomeCompanyRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:become_companies',
            'phone' => 'nullable|string|max:15',
            'company_address' => 'required|string|max:255',
            'company_work' => 'required|string|max:255',
            'position_in_company' => 'required|string|max:255',
            'company_headquarter' => 'required|string|max:255',
            'company_logo' => 'required|file|mimes:png,jpg,pdf',
            'license_and_tex_infomation' => 'required|file|mimes:png,jpg,pdf',
            'status' => 'required|in:rejected,approved,waitting',
            'show' => 'boolean',
            'user_id' => 'required|exists:users,id',
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
