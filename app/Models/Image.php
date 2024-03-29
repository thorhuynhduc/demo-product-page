<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $productId)
 */
class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'product_id',
        'name',
        'path',
    ];
}
