<?php

namespace Modules\OurTeam\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class StoreRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position_id'=> 'nullable|exists:positions,id',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'snapchat' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',

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
