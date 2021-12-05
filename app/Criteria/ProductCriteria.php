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
        'price_form_to',
        'price_form',
        'price_to',
    ];

    protected function criteriaName($query, $value)
    {
        if (!empty($value)) {
            $query->where(function ($query) use ($value) {
                $query->where('name', 'like', "%$value%")
                    ->orWhere('name', 'like', "%".strtolower($value)."%");
            });
        }
    }

    protected function criteriaDescription($query, $value)
    {
        if (!empty($value)) {
            $query->where(function ($query) use ($value) {
                $query->where('description', 'like', "%$value%")
                    ->orWhere('description', 'like', "%".strtolower($value)."%");
            });
        }
    }

    protected function criteriaKeyword($query, $value)
    {
        if (!empty($value)) {
            $query->where(function ($query) use ($value) {
                $query->where('name', 'like', "%$value%")
                    ->orWhere('description', 'like', "%$value%")
                    ->orWhere('name', 'like', "%".strtolower($value)."%")
                    ->orWhere('description', 'like', "%".strtolower($value)."%");
            });
        }
    }

    protected function criteriaPriceFormTo($query, $value)
    {
        if (!empty($value)) {
            $price = explode("_", $value);
            $query->where('price', '>=', $price[0])
                ->where('price', '<=', $price[1]);
        }
    }

    protected function criteriaPriceForm($query, $value)
    {
        if (!empty($value)) {
            $query->where('price', '>=', $value);
        }
    }

    protected function criteriaPriceTo($query, $value)
    {
        if (!empty($value)) {
            $query->where('price', '<=', $value);
        }
    }
}
