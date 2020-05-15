<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id'
    ];

    public function items()
    {
        return $this->hasMany('App\CartItem');
    }

    public function cart_price() {
        $price = $this->items()->sum('total_price_in_usd');

        return round($price, 2);
    }

    public function total_items() {
        $total = $this->items()->sum('total');

        return $total;
    }
}
