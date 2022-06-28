<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesType extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'string'
    ];

    // Belongs To
    public function users()
    {
        return $this->belongsTo(RealEstate::class);
    }
}
