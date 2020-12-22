<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'shipping_address',
        'express_shipping',
        'shipping_type',
        'status',
        'user_id'
    ];

    use HasFactory;
}
