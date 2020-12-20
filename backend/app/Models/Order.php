<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
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
