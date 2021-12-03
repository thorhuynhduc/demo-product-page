<?php

namespace App\Criteria;

use Illuminate\Database\Query\Builder;

class BrandCriteria extends Criteria
{
    protected array $criteria = [
        'id',
        'brand_id',
        'name',
        'description',
        'price',
        'keyword',
    ];

    protected function criteriaName(Builder $query, $value)
    {
        $query->where('name', 'like', "%$value%")
            ->orWhere('name', 'like', "%".strtolower($value)."%");
    }

    protected function criteriaDescription(Builder $query, $value)
    {
        $query->where('description', 'like', "%$value%")
            ->orWhere('description', 'like', "%".strtolower($value)."%");
    }

    protected function criteriaKeyword(Builder $query, $value)
    {
        $query->where('name', 'like', "%$value%")
            ->orWhere('description', 'like', "%$value%")
            ->orWhere('name', 'like', "%".strtolower($value)."%")
            ->orWhere('description', 'like', "%".strtolower($value)."%");
    }
}
