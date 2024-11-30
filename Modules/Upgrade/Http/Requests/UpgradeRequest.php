<?php

namespace Modules\Upgrade\Http\Requests;

use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Modules\Upgrade\Enums\StatusOrderEnum;
use Modules\Upgrade\Enums\TargetTypeEnum;
use Modules\Upgrade\Enums\TypeEnum;

class UpgradeRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'target_type' => 'nullable|integer|in:' . implode(',', [TargetTypeEnum::NORMAL_USER, TargetTypeEnum::INSTRUCTOR,TargetTypeEnum::INTERVIEWER,TargetTypeEnum::ACCOUNTANT,TargetTypeEnum::COMPANY]),
            'status' => 'nullable|integer|in:' . implode(',', [TypeEnum::Waitting, TypeEnum::Rejected,TypeEnum::Approved]),
            'interaction' => 'nullable|integer|in:' . implode(',',[StatusOrderEnum::ACTIVE,StatusOrderEnum::UNACTIVE])
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
