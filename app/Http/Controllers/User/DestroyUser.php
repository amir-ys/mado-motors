<?php

    namespace App\Http\Controllers\User;

    use App\Contracts\UserRepositoryInterface;
    use App\Http\Controllers\Controller;
    use App\Models\User;
    use App\Services\Responser;
    use Illuminate\Http\JsonResponse;

    class DestroyUser extends Controller
    {

        public function __invoke( User $user ): JsonResponse
        {
            app(UserRepositoryInterface::class)->destroy($user->id);
            return response()->json(Responser::success());
        }
    }
