<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\ProductImage;
use App\Tag;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $dates = ['deleted_at'];

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
        'promotion',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'path',
        'featured_image',
        'discounted_price',
        'category_name',
    ];



    /**
     * One product can have one category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function category()
    {
        return $this->hasOne('App\Category');
    }

    public function getDiscountedPriceAttribute()
    {
        return  number_format($this->price - (($this->price / 100) * $this->custom_discount), 2);

    }

    public function getCategoryNameAttribute()
    {
        return Category::where('id', '=', $this->category_id)->firstOrFail()->title;
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

    /**
     * A product belong to many carts
     *
     * @return
     */
    /* public function carts()
     {
         return $this->belongsToMany('App\Cart');
     }*/

    /**
     * Get all of the product_images for the product.
     */
    public function ProductImages()
    {
        return $this->hasManyThrough('App\ProductImage', 'App\Product');
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
     * Get the path for the product page.
     *
     * @return string
     */
    //  TODO: refactor this in one query and return a collation use this evrywhere
    public function getPathAttribute()
    {

        $subCategory = Category::where('id', '=', $this->category_id)->firstOrFail();
        $subCategorySlug = $subCategory->slug;
        $subCategoryId = $subCategory->id;
        $subCategoryId_parent = $subCategory->parent_id;

        $category = Category::where('id', '=', $subCategoryId_parent)->firstOrFail();
        $categorySlug = $category->slug;
        $categoryId = $category->parent_id;

        $mainCategory = Category::where('id', '=', $categoryId)->firstOrFail();
        $mainCategorySlug = $mainCategory->slug;

        return '/'.$mainCategorySlug.'/'.$categorySlug.'/'.$subCategorySlug.'/'.$this->slug;

    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function getSizeNameAttribute()
    {
        return Size::withTrashed()->where('id', '=', $this->pivot->size_id)->firstOrFail()->name;
    }

}
