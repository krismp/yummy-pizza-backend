<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id', 'status', 'cart_id', 'address', 'final_price_in_usd', 'delivery_cost_in_usd'
    ];

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }
}
