<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            #todo add national code validator
            'phone' => 'nullable',
            'email' => [
                'nullable' ,
                'email' ,
                Rule::unique(User::getTableName())
            ],            'password' => 'required|confirmed|min:6',
        ];
    }
}
