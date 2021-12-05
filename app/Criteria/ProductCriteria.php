<?php

namespace App\Criteria;

class ProductCriteria extends Criteria
{
    protected array $criteria = [
        'id',
        'brand_id',
        'name',
        'description',
        'price',
        'keyword',
    ];

    protected function criteriaName($query, $value)
    {
        $query->where('name', 'like', "%$value%")
            ->orWhere('name', 'like', "%".strtolower($value)."%");
    }

    protected function criteriaDescription($query, $value)
    {
        $query->where('description', 'like', "%$value%")
            ->orWhere('description', 'like', "%".strtolower($value)."%");
    }

    protected function criteriaKeyword($query, $value)
    {
        $query->where('name', 'like', "%$value%")
            ->orWhere('description', 'like', "%$value%")
            ->orWhere('name', 'like', "%".strtolower($value)."%")
            ->orWhere('description', 'like', "%".strtolower($value)."%");
    }
}
