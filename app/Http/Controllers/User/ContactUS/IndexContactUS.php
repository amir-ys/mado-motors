<?php

namespace App\Http\Controllers\User\ContactUS;

use App\Contracts\Services\ContactUSServiceInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Carbon\CarbonInterval;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexContactUS extends Controller
{
    public function __invoke(): JsonResponse
    {
        $contactUsService = resolve(ContactUSServiceInterface::class);

        $contactUS = Cache::remember(
            'contact_us',
            CarbonInterval::day()->totalSeconds,
            function () use ($contactUsService) {
                return $contactUsService->getContactUs();
            }
        );

        return ApiResponse::success(
            data: $contactUS
        );
    }
}
