<?php

namespace App\Http\Requests\Admin\Order;

use App\Enums\OrderStatusEnum;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
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
            'user_id' => ['required', Rule::exists(User::getTableName(), 'id')],
            'address_id' => ['required', Rule::exists(UserAddress::getTableName(), 'id')],
            'total_price' => ['required', 'numeric'],
            'status' => ['required', Rule::enum(OrderStatusEnum::class)],
        ];
    }
}
