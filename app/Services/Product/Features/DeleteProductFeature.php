<?php

namespace App\Services\Product\Features;

use App\Models\Product;
use App\Services\BaseFeature;

class DeleteProductFeature extends BaseFeature
{
    public function handle($productId)
    {
        Product::findOrFail($productId);

        return Product::where('id', $productId)->delete();
    }
}
