<?php

namespace App\Http\Requests\Admin\Product;

use App\Models\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductRequest extends FormRequest
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
            'title_fa' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'category_id' => ['required', Rule::exists(ProductCategory::getTableName(), 'id')],
            'description' => ['required', 'string', 'min:10'],
            'spod_id' => ['nullable'],
            'original_price' => ['nullable', 'numeric',],
            'payable_price' => ['nullable', 'numeric',],
            'quantity' => ['nullable', 'numeric',],
            'variants' => ['nullable', 'array',],
            'variants.*.original_price' => ['required', 'integer', 'min:0'],
            'variants.*.payable_price' => ['required', 'integer', 'min:0', 'lte:variants.*.original_price'],
            'variants.*.quantity' => ['required', 'integer', 'min:0'],
            'variants.*.attributes' => ['required', 'array', 'min:1'],
            'variants.*.attributes.*.attribute_value_id' => ['required', 'exists:attribute_values,id'],
        ];
    }
}
