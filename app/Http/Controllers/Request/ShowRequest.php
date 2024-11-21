<?php

    namespace App\Http\Controllers\Request;

    use App\Contracts\RequestRepositoryInterface;
    use App\Http\Controllers\Controller;
    use App\Http\Resources\RequestResource;
    use App\Models\Request;

    class ShowRequest extends Controller
    {

        public function __invoke( Request $request ): RequestResource
        {
            return RequestResource::make(
                app(RequestRepositoryInterface::class)->show($request->id)
            );
        }

    }
