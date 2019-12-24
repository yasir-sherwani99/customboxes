<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image_name',
        'image_big',
        'image_medium',
        'image_small',
        'dimensions'
    ];

    public function image(){
        return $this->belongsTo(Product::class);
    }
    
}
