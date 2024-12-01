<?php

namespace App\Repositories;

use App\Contracts\ProductDetailRepositoryInterface;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductDetailRepository extends BaseRepository implements ProductDetailRepositoryInterface
{
    public function model(): string
    {
        return ProductDetail::class;
    }

    public function store(array $attributes)
    {
        $detail = null;
        DB::transaction(function () use ($attributes, &$detail) {
            $detail = $this->create($attributes);
            $detail->owners()->attach($detail->owner_id, ['transfer_date' => now()]);
        });

        if (!$detail) {
            throw new NotFoundHttpException('item not save');
        }

        $detail->load(['order', 'owner', 'agent']);

        return $detail;
    }

    public function checkExists($data): bool
    {
        $record = $this->findWhere([
            'chassis_number' => $data['chassis_number'],
            'engine_number' => $data['engine_number'],
        ]);

        if ($record->count() > 0) {
            return true;
        }
        return false;
    }
}
