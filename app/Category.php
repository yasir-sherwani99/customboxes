<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'main_category',
        'page_title',
        'page_description',
        'page_keywords',
        'slug',
        'status'
    ];

    public function category(){
        return $this->hasMany(CategoryImage::class, 'category_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }

}
