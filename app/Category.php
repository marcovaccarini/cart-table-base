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
        'path',
        'header_image',
    ];

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
        return $this->hasMany('Product', 'id');
    }
}
