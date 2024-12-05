<?php

namespace App\Http\Requests\User\Cart;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCartRequest extends FormRequest
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
            'product_id' => [
                'required', Rule::exists(Product::getTableName(), 'id')
            ],
            'product_variant_id' => [
                'nullable', Rule::exists(ProductVariant::getTableName(), 'id')
            ],
            'quantity' => ['required', 'numeric']
        ];
    }
}
