<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
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
