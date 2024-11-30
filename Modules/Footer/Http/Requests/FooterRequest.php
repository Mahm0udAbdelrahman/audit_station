<?php

namespace Modules\Footer\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class FooterRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'facebook' => ValidationRuleHelper::urlRules(false),
            'instagram' => ValidationRuleHelper::urlRules(false),
            'twitter' => ValidationRuleHelper::urlRules(false),
            'linkedin' => ValidationRuleHelper::urlRules(false),
            'youtube' => ValidationRuleHelper::urlRules(false),
            'tiktok' => ValidationRuleHelper::urlRules(false),
            'snapchat' => ValidationRuleHelper::urlRules(false),
            'app_store' => ValidationRuleHelper::urlRules(false),
            'google_play' => ValidationRuleHelper::urlRules(false),

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
