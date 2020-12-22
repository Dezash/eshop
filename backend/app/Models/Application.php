<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function applicant()
    {
        return $this->belongsTo('App\Models\User', 'applicant_id');
    }

    public function reviewer()
    {
        return $this->belongsTo('App\Models\User', 'reviewer_id');
    }

    protected $fillable = [
        'status',
        'text',
        'comment',
        'applicant_id',
        'reviewer_id'
    ];
}
