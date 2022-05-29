<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Gloudemans\Shoppingcart\CanBeBought;


class Product extends Model implements Buyable
{
    use HasFactory,CanBeBought;

    public function getPriceAttribute()
    {
        return $this->attributes['price'] / 100;
    }
    public function scopeMightAlsoLike($query)
    {
        $query->inRandomOrder()->take(4);
    }
}
