<?php

namespace App\Http\Requests\Admin\ReviewPoint;

use App\Enums\ReviewPointTypeEnum;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReviewPointRequest extends FormRequest
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
            'product_id' => ['nullable', Rule::exists(Product::getTableName())],
            'type' => ['required', Rule::enum(ReviewPointTypeEnum::class)],
            'text' => ['required', 'string', 'min:2'],
        ];
    }
}
