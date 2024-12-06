<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Prettus\Validator\Exceptions\ValidatorException;

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
                "variants.attributes.attribute",
                "relatedProducts",
                "media",
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
            "variants.attributes.attribute",
            "relatedProducts",
            "media",
        ]);
        return $product;
    }

    /**
     * @throws ValidatorException
     */
    public function store($attributes): Model|Builder
    {
        $product = $this->create(Arr::except($attributes, ["variants", 'related_products']));

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

        if (Arr::has($attributes, "related_products")) {
            $product->relatedProducts()->sync($attributes['related_products']);
        }

        $product->load([
            "category",
            "variants",
            "variants.attributes",
            "variants.attributes.attribute",
            "relatedProducts"
        ]);

        return $product;
    }

    public function update(array $attributes, $id)
    {
        $product = $this->find($id);

        $product->update([
            'title_fa' => $attributes['title_fa'],
            'title_en' => $attributes['title_en'],
            'description' => $attributes['description'] ?? null,
            'category_id' => $attributes['category_id'],
            'original_price' => $attributes['original_price'],
            'price' => $attributes['price'],
            "quantity" => $attributes['quantity'],
        ]);

        $variantIds = [];
        foreach ($attributes['variants'] as $variantData) {
            if (isset($variantData['id'])) {
                $variant = $product->variants()->findOrFail($variantData['id']);
                $variant->update([
                    'original_price' => $variantData['original_price'],
                    'price' => $variantData['price'],
                    'quantity' => $variantData['quantity'],
                ]);
            } else {
                $variant = $product->variants()->create([
                    'original_price' => $variantData['original_price'],
                    'price' => $variantData['price'],
                    'quantity' => $variantData['quantity'],
                ]);
            }

            $variantIds[] = $variant->id;

            $variant->attributes()->sync(
                collect($variantData['attributes'])->pluck('attribute_value_id')
            );
        }

        $product->variants()->whereNotIn('id', $variantIds)->delete();

        if (Arr::has($attributes, "related_products")) {
            $product->relatedProducts()->sync($attributes['related_products']);
        }

        $product->load([
            "category",
            "variants",
            "variants.attributes",
            "variants.attributes.attribute",
            "relatedProducts"
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
        $product->relatedProducts()->detach();

        return $product->delete();
    }
}
