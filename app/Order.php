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
        'user_id', 'status', 'cart_id'
    ];

    public function cart()
    {
        return $this->hasOne('App\Cart');
    }
}
