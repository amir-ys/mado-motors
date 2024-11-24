<?php

namespace App\Repositories;

use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function model(): string
    {
        return Product::class;
    }

    public function index()
    {
        return Product::query()
            ->with([
                "category",
                "variants",
                "variants.attributes",
                "variants.attributes.attribute"
            ])
            ->filtered()
            ->paginate();
    }

    public function show($id)
    {
        $product = $this->find($id);
        $product->load([
            "category",
            "variants",
            "variants.attributes",
            "variants.attributes.attribute"
        ]);
        return $product;
    }

    public function store($attributes): Model|Builder
    {
        #todo fill creator_id
        $attributes = Arr::add($attributes, 'creator_id', 10);
        $product = $this->create(Arr::except($attributes, "variants"));

        #todo store media
//        MediaHelper::storeMediaFor($product);

        if (Arr::has($attributes, "variants")) {
            foreach ($attributes["variants"] as $variation) {
                $variant = $product->variants()->create($variation);

                foreach ($variation['attributes'] as $attributeData) {
                    $variant->attributes()->attach($attributeData['attribute_value_id']);
                }
            }
        }

        $product->load([
            "category",
            "variants",
            "variants.attributes",
            "variants.attributes.attribute"
        ]);

        return $product;
    }

    public function update(array $attributes, $id)
    {
        $product = $this->find($id);

        // آپدیت اطلاعات محصول
        $product->update([
            'title_fa' => $attributes['title_fa'],
            'title_en' => $attributes['title_en'],
            'description' => $attributes['description'] ?? null,
            'category_id' => $attributes['category_id'],
            'base_price' => $attributes['base_price'],
        ]);

        $variantIds = []; // برای نگه‌داشتن واریانت‌هایی که باید باقی بمانند
        foreach ($attributes['variants'] as $variantData) {
            if (isset($variantData['id'])) {
                $variant = $product->variants()->findOrFail($variantData['id']);
                $variant->update([
                    'original_price' => $variantData['original_price'],
                    'payable_price' => $variantData['payable_price'],
                    'quantity' => $variantData['quantity'],
                ]);
            } else {
                $variant = $product->variants()->create([
                    'original_price' => $variantData['original_price'],
                    'payable_price' => $variantData['payable_price'],
                    'quantity' => $variantData['quantity'],
                ]);
            }

            $variantIds[] = $variant->id;

            $variant->attributes()->sync(
                collect($variantData['attributes'])->pluck('attribute_value_id')
            );
        }

        $product->variants()->whereNotIn('id', $variantIds)->delete();

        $product->load([
            "category",
            "variants",
            "variants.attributes",
            "variants.attributes.attribute"
        ]);

        return $product;
    }

    public function destroy($id)
    {
        $product = $this->find($id);
        $product->variants()->each(function ($variant) {
            $variant->attributes()->detach();
            $variant->delete();
        });

        return $product->delete();
    }
}
