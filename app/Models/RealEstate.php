<?php

namespace App\Models;

use App\Models\User;
use App\Models\SalesType;
use App\Models\BuildingType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\StatusRealEstate;

class RealEstate extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'string'
    ];

    // Many To Many
    public function user()
    {
        return $this->belongsToMany(User::class, 'Carts', 'realEstateId', 'userId');
    }

    // Belongs To
    public function salesType()
    {
        return $this->belongsTo(SalesType::class, 'salesTypeId');
    }

    public function buildingType()
    {
        return $this->belongsTo(BuildingType::class, 'buildingTypeId');
    }

    public function status()
    {
        return $this->belongsTo(StatusRealEstate::class, 'statusId');
    }
}
