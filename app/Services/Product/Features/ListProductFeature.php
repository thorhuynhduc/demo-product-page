<?php

namespace App\Services\Product\Features;

use App\Criteria\ProductCriteria;
use App\Models\Product;
use App\Services\BaseFeature;

class ListProductFeature extends BaseFeature
{
    public function handle($param)
    {
        $query = Product::query();
        (new ProductCriteria($param))->apply($query);

        return $query->paginate();
    }
}
