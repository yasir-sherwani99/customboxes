<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    
    protected $fillable = [
        'admin_id',
        'title',
        'category_id',
        'description',
        'image',
        'status'
    ];

    public function tag()
    {
        return $this->belongsToMany(Category::class, 'blog_tags');
    }

    public function blog_category()
    {
        return $this->hasOne(BlogCategory::class, 'id', 'category_id')->withDefault();
    }

}
