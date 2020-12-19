<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function image()
    {
        return $this->hasMany('App\Models\Image');
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'sold',
        'quality_type',
        'warranty_duration',
        'discount'
    ];

    use HasFactory;
}
