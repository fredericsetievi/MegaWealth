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

    // Has Many
    public function realEstate()
    {
        return $this->hasMany(RealEstate::class);
    }
}
