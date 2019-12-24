<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    protected $fillable = [
        'product_id',
        'dimensions',
        'printing',
        'paper_stock',
        'quantities',
        'coating',
        'default_process',
        'options',
        'proof',
        'turn_around_time',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
