<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $fillable = [
        'business_title',
        'email',
        'quotation_email',
        'contact_email',
        'phone',
        'street_address',
        'city',
        'state',
        'zip',
        'country',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'pinterest',
        'banner_image'
    ];
}
