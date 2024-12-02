<?php

namespace App\Http\Requests\User\ReviewPoint;

use App\Enums\ReviewPointTypeEnum;
use App\Models\Product;
use App\Models\ReviewPoint;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductReviewRequest extends FormRequest
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
            'product_id' => ['nullable', Rule::exists(Product::getTableName(), 'id')],
            'text' => ['required', 'string', 'min:2'],
            'review_points_ids' => ['nullable', 'array'],
            'review_points_ids.*' => ['required', Rule::exists(ReviewPoint::getTableName(), 'id')],
            'review_points_texts' => ['nullable', 'array'],
            'review_points_texts.*.type' => ['required', Rule::enum(ReviewPointTypeEnum::class)],
            'review_points_texts.*.text' => ['required', 'string'],
        ];
    }
}
