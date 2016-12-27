<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'tag',
        'tag_image',
    ];

    /**
     * A tag can belong to many products
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
