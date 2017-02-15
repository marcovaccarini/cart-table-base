<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'id_type_address',
        'first_name',
        'last_name',
        'street',
        'apartment',
        'city',
        'state',
        'zip_code',
        'phone',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
