<?php

namespace App\Http\Requests\Agent\Product;

use App\Models\ProductDetail;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransferProductDetailOwnerRequest extends FormRequest
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
            'id' => ['required', Rule::exists(ProductDetail::getTableName(), 'id')],
            'owner_mobile' => [
                'required',
                'confirmed',
                Rule::exists(User::getTableName(), 'mobile')
            ],
        ];
    }
}
