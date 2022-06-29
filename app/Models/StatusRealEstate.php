<?php

namespace App\Models;

use App\Models\RealEstate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusRealEstate extends Model
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
