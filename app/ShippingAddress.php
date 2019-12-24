<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'company',
        'street_address',
        'city',
        'state',
        'zip',
        'country'
    ];
    
}
