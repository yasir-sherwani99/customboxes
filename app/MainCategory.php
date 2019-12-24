<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $fillable = [
        'title',
        'image',
        'status'
    ];
}
