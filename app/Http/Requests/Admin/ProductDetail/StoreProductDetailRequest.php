<?php

namespace App\Http\Requests\Admin\ProductDetail;

use App\Models\Agent;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductDetailRequest extends FormRequest
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
            'owner_id' => ['required', Rule::exists(User::getTableName(), 'id')],
            'order_id' => ['required', Rule::exists(Order::getTableName(), 'id')],
            'agent_id' => ['required', Rule::exists(Agent::getTableName(), 'id')],
            'product_id' => ['required', Rule::exists(Product::getTableName(), 'id')],
            'chassis_number' => ['required'],
            'engine_number' => ['required'],
            'plaque_number' => ['required'],
        ];
    }
}
