<?php

namespace App\Services\Product\Features;

use App\Models\Product;
use App\Services\BaseFeature;

class CreateProductFeature extends BaseFeature
{
    public function handle($param)
    {
        return Product::create($param);
    }
}
