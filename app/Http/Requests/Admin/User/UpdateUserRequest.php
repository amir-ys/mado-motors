<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
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
            'mobile' => [
                'required',
                'string',
                'regex:/^09[0-9]{9}$/',
                Rule::unique('users', 'mobile')
                    ->ignore($this->route()->parameter('user'))
                    ->whereNull('deleted_at')
            ],
            #todo add national code validator
            'national_code' => [
                'required',
                'digits:10',
                Rule::unique(User::getTableName(), 'national_code')
                    ->ignore($this->route()->parameter('user'))
                    ->whereNull('deleted_at')
            ],
            'phone' => 'nullable',
            'email' => [
                'nullable',
                'email',
                Rule::unique(User::getTableName(), 'email')
                    ->ignore($this->route()->parameter('user'))
                    ->whereNull('deleted_at')
            ],
            'password' => 'required|confirmed|min:6',
        ];
    }
}
