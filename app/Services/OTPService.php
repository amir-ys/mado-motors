<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class OTPService
{
    private string $phoneNumber;
    private int $otpCode;

    public function requestOtp(string $phoneNumber): int
    {
        $this->phoneNumber = $phoneNumber;

        $this->processOtpRequest();

        return $this->otpCode;
    }

    private function processOtpRequest(): void
    {
        $cachedOtp = Cache::get($this->getCacheKey());

        if ($cachedOtp) {
            $this->checkCodeExpiration($cachedOtp);
        } else {
            $this->generateCode();
        }
    }

    private function checkCodeExpiration(array $otpData): void
    {
        if ($otpData['expires_at'] < now()->timestamp) {
            $this->generateCode(true);
        } else {
            $this->otpCode = $otpData['code'];
        }
    }

    private function generateCode(bool $forceReplace = false): void
    {
        if ($forceReplace) {
            $this->deletePreviousCode();
        }

        $this->otpCode = $this->generateRandomUniqueCode();
        $expirationTime = config('otp.expiration_time', 300);

        Cache::put(
            $this->getCacheKey(),
            [
                'code' => $this->otpCode,
                'expires_at' => now()->timestamp + $expirationTime,
            ],
            $expirationTime
        );
    }

    private function generateRandomUniqueCode(): int
    {
        return random_int(100000, 999999);
    }

    private function deletePreviousCode(): void
    {
        Cache::forget($this->getCacheKey());
    }

    private function getCacheKey(): string
    {
        return "otp_{$this->phoneNumber}";
    }

    public function verifyOtp(string $phoneNumber, int $code): bool
    {
        $cachedOtp = Cache::get("otp_{$phoneNumber}");

        if (!$cachedOtp) {
            return false;
        }

        if ($cachedOtp['code'] != $code) {
            return false;
        }

        Cache::forget("otp_{$phoneNumber}");

        return true;
    }
}
