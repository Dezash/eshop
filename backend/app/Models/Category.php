<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }

    protected $fillable = [
        'name'
    ];

    use HasFactory;
}
