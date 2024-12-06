<?php

namespace App\Http\Requests\User\Product;

use App\Models\ProductDetail;
use App\Models\User;
use App\Rules\ValidateMobile;
use App\Rules\ValidateNationalCode;
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
                new ValidateMobile(),
                Rule::exists(User::getTableName(), 'mobile')
                    ->whereNull('deleted_at')
            ],
            'owner_notional_code' => [
                'required',
                'digits:10',
                new ValidateNationalCode(),
                Rule::exists(User::getTableName(), 'national_code')
                    ->whereNull('deleted_at')
            ],
        ];
    }
}
