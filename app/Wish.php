<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $table = 'wishes';

    protected $fillable = [
        'user_id',
        'cart_id',
        'product_id',
    ];

    /**
     * A product belong to a wish
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    /**
     * A picture belong to a wish
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ProductImages()
    {
        return $this->belongsTo('App\ProductImage', 'product_id');
    }

}
