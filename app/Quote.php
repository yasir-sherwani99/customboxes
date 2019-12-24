<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'invoice',
        'full_name',
        'email',
        'phone',
        'box_type_id',
        'stock',
        'width',
        'height',
        'length',
        'units',
        'colors',
        'quantity',
        'comments',
        'status'
    ];

}
