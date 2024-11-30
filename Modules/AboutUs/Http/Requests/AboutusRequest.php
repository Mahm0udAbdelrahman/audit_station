<?php

namespace Modules\AboutUs\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutusRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string|max:1000',
            'YouTube_Link' => 'nullable|url',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
