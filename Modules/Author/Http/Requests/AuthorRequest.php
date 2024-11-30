<?php

namespace Modules\Author\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'title' => 'required|string|max:100',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ];
    }



    public function authorize(): bool
    {
        return true;
    }
}
