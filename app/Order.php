<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'cart_id',
        'email',
        'has_billing_address',
        'subtotal',
        'shipping_cost',
        'total',
        'status_id',
        'note',
        'transaction_id'
    ];

    protected $dates = ['deleted_at'];



    public function orderItems()
    {
        return $this->belongsToMany(Product::class)->withPivot('size_id', 'qty', 'price', 'sub_total', 'discount');

    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }



    public function sizeName()
    {
        //return $this->belongsTo(Size::class)->where('id', '=', $this->size_id)->firstOrFail();
        return $this->belongsTo(Size::class, 'size_id');
    }
}
