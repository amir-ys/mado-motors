<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class ValidateNationalCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $normalizedNumber = str_pad($value, 10, '0', STR_PAD_LEFT);
        $controlCode = (int)substr($normalizedNumber, 9, 1);
        $checksum = 0;

        for ($i = 0; $i < 9; $i++) {
            $checksum += (int)$normalizedNumber[$i] * (10 - $i);
        }

        $res = $checksum % 11 === $controlCode || 11 - ($checksum % 11) === $controlCode;
        if (!$res) {
            $fail('validation.national_code')->translate();
        }
    }
}
