<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'cart_id',
        'email',
        'has_billing_address',
        'subtotal',
        'shipping_cost',
        'total',
    ];


    public function orderItems()
    {
        return $this->belongsToMany(Product::class)->withPivot('size_id', 'qty', 'price', 'sub_total', 'discount');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }


}
