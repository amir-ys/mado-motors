<?php

namespace App\Http\Requests\User\Contact;

use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAgentRequestRequest extends FormRequest
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
            'mobile' => [
                'required',
                'string',
                'regex:/^09[0-9]{9}$/',
                Rule::unique('users', 'mobile')
                    ->whereNull('deleted_at')
            ],
            'national_code' => [
                'required',
                'digits:10',
                Rule::unique(User::getTableName(), 'national_code')
            ],
            'phone' => 'nullable',
            'city_id' => ['required', Rule::exists(City::getTableName(), 'id')],
            'address' => ['required', 'string', 'min:10'],
            'postal_code' => ['required', 'digits:10'],
        ];
    }
}
