<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use stdClass;

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

    public function order()
    {
        return $this->hasOne('App\Order');
    }

    public function items()
    {
        return $this->hasMany('App\CartItem');
    }

    public function product_items()
    {
        $products = [];
        foreach($this->items as $item) {
            $product = new stdClass();
            $p = $item->product($item->product_id);
            $product->id = $item->product_id;
            $product->name = $p->name;
            $product->total = $item->total;
            $product->unit_price = $p->price_in_usd;
            array_push($products, $product);
        };

        return $products;
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
