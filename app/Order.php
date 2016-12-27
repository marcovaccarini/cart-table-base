<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'billing_address',
        'total'
        ];

    public function orderItems()
    {
        return $this->belongsToMany('Product')->withPivot('qty', 'total');
    }
}
