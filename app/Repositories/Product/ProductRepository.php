<?php

namespace App\Repositories\Product;

use App\Interfaces\Product\ProductRepositoryInterface;
use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function query(array $payload = []): Builder
    {
        return parent::query($payload)
            ->when(!empty($payload['user_id']), function ($q) use ($payload) {
                $q->where('user_id', $payload['user_id']);
            })
            ->when(!empty($payload['search']), function ($qq) use ($payload) {
                $qq->where('title', 'like', '%' . $payload['search'] . '%');
            });
    }

    public function toggle(Product $product): Product
    {
        $product->status = !$product->status;
        $product->save();

        return $product;
    }
}
