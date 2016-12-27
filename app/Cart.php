<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;


class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'cart_id',
        'product_id',
        'qty',
    ];

    /**
     * A product belong to a cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /*public function Products()
    {
        return $this->belongsTo('Product', 'product_id');
    }*/

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
