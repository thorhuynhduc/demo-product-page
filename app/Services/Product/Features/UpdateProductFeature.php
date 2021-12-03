<?php

namespace App\Services\Product\Features;

use App\Models\Product;
use App\Services\BaseFeature;

class UpdateProductFeature extends BaseFeature
{
    public function handle($productId, $dataUpdate)
    {
        Product::findOrFail($productId);

        return Product::where('id', $productId)->update($dataUpdate);
    }
}
