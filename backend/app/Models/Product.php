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

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
