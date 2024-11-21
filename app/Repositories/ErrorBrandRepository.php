<?php

namespace App\Repositories;

use App\Contracts\ErrorBrandRepositoryInterface;
use App\Models\ErrorBrand;
use Illuminate\Pagination\LengthAwarePaginator;

class ErrorBrandRepository implements ErrorBrandRepositoryInterface
{
    public function index()
    {
        return ErrorBrand::get();
    }

    public function all()
    {
        return ErrorBrand::filtered()->get();
    }

    public function indexOnline(): LengthAwarePaginator
    {
        return ErrorBrand::with(['errors.errorBrand'])->paginate();
    }

    public function show($errorBrandId)
    {
        $errorBrand = ErrorBrand::findOrFail($errorBrandId);
        $errorBrand->load(["errors"]);
        return $errorBrand;
    }

    public function showOnline($errorBrandId)
    {
        $errorBrand = ErrorBrand::findOrFail($errorBrandId);
        $errorBrand->load(["errors"]);
        return $errorBrand;
    }

    public function store(array $data)
    {
        $errorBrand = ErrorBrand::query()->create($data);

        $errorBrand->load(["errors"]);
        return $errorBrand;
    }

    public function update(array $data, int $errorBrandId)
    {
        $errorBrand = ErrorBrand::findOrFail($errorBrandId);
        $errorBrand->update($data);

        $errorBrand->load(["errors"]);
        return $errorBrand;
    }

    public function destroy(int $errorBrandId)
    {
        $errorBrand = ErrorBrand::findOrFail($errorBrandId);
        return $errorBrand->delete();
    }
}
