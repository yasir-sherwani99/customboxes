<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'main_description',
        'price',
        'units_in_stock',
        'page_title',
        'page_description',
        'page_keywords',
        'slug',
        'status'
    ];

    public function product(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->withDefault();
    }

    public function product_specification()
    {
        return $this->hasOne('App\ProductSpecification');
    }

}
