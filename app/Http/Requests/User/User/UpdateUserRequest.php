<?php

namespace App\Http\Requests\User\User;

use App\Models\City;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'nullable',
            'city_id' => ['required', Rule::exists(City::getTableName(), 'id')],
            'address' => ['required', 'string', 'min:10'],
            'postal_code' => ['required', 'digits:10'],
        ];
    }
}
