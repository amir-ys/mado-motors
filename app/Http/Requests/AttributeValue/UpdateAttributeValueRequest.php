<?php

namespace App\Http\Requests\AttributeValue;

use App\Models\AttributeValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAttributeValueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'value' => ['required', 'string', 'min:2'],
            'attribute_id' => [
                'required', Rule::exists(AttributeValue::getTableName())
            ],
        ];
    }
}
