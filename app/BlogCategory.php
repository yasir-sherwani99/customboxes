<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'title'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class)->withDefault();
    }

}
