<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'cart_id', 'product_id', 'total', 'total_price_in_usd'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }
}
