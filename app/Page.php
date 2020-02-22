<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug',
        'page_title',
        'page_description',
        'page_keywords',
        'status'
    ];
}
