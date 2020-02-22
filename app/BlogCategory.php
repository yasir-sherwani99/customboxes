<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class)->withDefault();
    }

}
