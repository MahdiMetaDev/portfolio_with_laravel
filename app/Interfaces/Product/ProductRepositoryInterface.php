<?php

namespace App\Interfaces\Product;

use App\Interfaces\BaseRepositoryInterface;
use App\Models\Product;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function toggle(Product $product): Product;
}
