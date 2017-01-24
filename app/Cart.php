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
        'size_id',
        'qty',
    ];

    protected $appends = ['total_price'];


    /**
     * A product belong to a cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    /**
     * Get all of the product_images for the product.
     */
/*    public function ProductImages()
    {
        return $this->hasManyThrough('App\ProductImage', 'App\Product',
            'id', 'product_id', 'id')->where('product_images.featured', 1);
    }*/


    /**
     * A picture belong to a cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ProductImages()
    {
        return $this->belongsTo('App\ProductImage', 'product_id');
    }


    /**
     * A size belong to a cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sizenames()
    {
        return $this->belongsTo('App\Size', 'size_id');
    }

    public function getTotalPriceAttribute()
    {
        return  number_format($this->product->price - (($this->product->price / 100) * $this->custom_discount)*$this->qty, 2);

    }



}
