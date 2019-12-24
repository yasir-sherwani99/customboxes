<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    protected $fillable = [
        'category_id',
        'image'
    ];

    public function image(){
        return $this->belongsTo(Category::class);
    }
}
