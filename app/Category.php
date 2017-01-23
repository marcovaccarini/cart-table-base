<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = [
        'title',
        'description',
        'parent_id',
        'slug',
        'home_image',
        'header_image',
        'favorite'
    ];

    protected $appends = ['path_category'];

    /**
     * One subcategory belong to a Main category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    /**
     * Get the index name for the model
     * @return string
     */
    public function childs()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }

    /**
     * A category have many product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        /*return $this->hasMany('Product', 'id');*/
        return $this->hasMany('App\Product');
    }
/*TODO: use this also in category page*/
    public function getPathCategoryAttribute()
    {
        $path_category = '';

        $parentId = $this::find($this->id)->parent_id;

        do {
            $ancestor = $this::find($parentId);
            if($ancestor){
            $path_category = '/'. $ancestor->slug . $path_category;
            $parentId = $ancestor->parent_id;
                //dd($parentId);
            }
        } while ($ancestor);

        $path_category .= '/'.$this->slug;

        return $path_category;
    }
}
