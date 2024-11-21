<?php

namespace App\Repositories;

use App\Contracts\ErrorRepositoryInterface;
use App\Models\Error;
use App\Services\Media\MediaHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ErrorRepository implements ErrorRepositoryInterface
{
    public function destroy($errorId)
    {
        $error = Error::with('errorItems','errorItems.errorCodes')->findOrFail($errorId);
        return $error->delete();
    }

    public function all()
    {
        return Error::filtered()->get();
    }

    public function index()
    {
        return Error::filtered()->with(['errorBrand','errorCategory','errorItems','errorItems.errorCodes'])->paginate();
    }

    public function indexOnline()
    {
        return Error::filtered()->with(['errorBrand','errorCategory','errorItems','errorItems.errorCodes'])->paginate();
    }

    public function show($errorId)
    {
        $error = Error::findOrFail($errorId);
        $error->load(["errorBrand", "errorCategory", "errorItems", "errorItems.errorCodes"]);
        return $error;
    }

    public function showOnline($errorId)
    {
        $error = Error::findOrFail($errorId);
        $error->load(["errorBrand", "errorCategory", "errorItems", "errorItems.errorCodes"]);
        return $error;
    }

    public function store($data): Model|Builder
    {
        $error = Error::query()->create($data);

        MediaHelper::storeMediaFor($error);

        $error->load(["errorBrand", "errorCategory", "errorItems"]);
        return $error;
    }

    public function update(array $data, int $errorId)
    {
        $error = Error::findOrFail($errorId);
        $error->update($data);

        $error->load(["errorBrand", "errorCategory", "errorItems"]);
        return $error;
    }
}
