<?php

namespace App\Http\Requests\ErrorCategory;

use Illuminate\Foundation\Http\FormRequest;

class CreateErrorCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string' ,
            'title_en' => 'nullable|string' ,
        ];
    }
}
