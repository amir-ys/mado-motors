<?php

namespace App\Http\Requests\ErrorBrand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateErrorBrandRequest extends FormRequest
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
