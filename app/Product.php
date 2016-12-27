<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\ProductImage;
use App\Tag;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'slug',
        'path',
        'price',
        'tax',
        'custom_discount',
        'description',
        'specification',
        'category_id',
        'new',
        'featured',
    ];

    /**
     * One product can have one category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function category()
    {
        return $this->hasOne('App\Category', 'id');
    }

    public function discountedPrice()
    {
        $discounted_price = $this->price - (($this->price / 100) * $this->custom_discount);
        //return $discounted_price;
    }


    /**
     * A Product can have many image
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\ProductImage');
        //return $this->belongsToMany(ProductImage::class);
    }

    /**
     * Return a product can have one featured image where "featured" column = true or 1
     *
     * @return mixed
     */
    public function getFeaturedImageAttribute()
    {
        return $this->images->where('featured', true)->first();
    }

    /**
     * A product can have many tags
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withPivot('product_id', 'tag_id');
    }

    /**
     * A product can have many sizes
     * @return $this
     */
    public function sizes()
    {
        return $this->belongsToMany('App\Size')->withPivot('product_id', 'size_id');

    }



}
