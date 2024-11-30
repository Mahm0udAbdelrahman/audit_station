<?php

namespace Modules\SubCategory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
class SubcategoryRequest extends FormRequest
{
    use HttpResponse;
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
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
