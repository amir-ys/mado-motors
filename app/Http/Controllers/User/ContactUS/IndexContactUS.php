<?php

namespace App\Http\Controllers\User\ContactUS;

use App\Contracts\Services\ContactUSServiceInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexContactUS extends Controller
{
    public function __invoke(): JsonResponse
    {
        $contactUsService = resolve(ContactUSServiceInterface::class);
        $contactUS = $contactUsService->getContactUs();
        return ApiResponse::created(
            data: $contactUS
        );
    }
}
