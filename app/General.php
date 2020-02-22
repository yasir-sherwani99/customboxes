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
        'page_title',
        'page_description',
        'page_keywords',
        'home_page_heading',
        'home_page_sub_heading',
        'home_page_description',
        'home_page_banner_1',
        'home_page_banner_2',
        'home_page_banner_3',
        'home_page_banner_4',
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
