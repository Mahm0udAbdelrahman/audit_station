<?php

namespace Modules\Ads\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
{



    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string|max:1000',
            'link' => 'nullable|url|regex:/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/',
        ];

    }



    public function authorize(): bool
    {
        return true;
    }
}
