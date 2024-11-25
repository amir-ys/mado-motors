<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Rules\ValidateMobile;
use App\Rules\ValidateNationalCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
                new ValidateMobile(),
                Rule::unique(User::getTableName(), 'mobile')
                    ->whereNull('deleted_at')
            ],
            'national_code' => [
                'required',
                'digits:10',
                new ValidateNationalCode(),
                Rule::unique(User::getTableName(), 'national_code')
                    ->whereNull('deleted_at')
            ],
            'password' => ['required', 'confirmed', 'min:6'],
        ];
    }
}
