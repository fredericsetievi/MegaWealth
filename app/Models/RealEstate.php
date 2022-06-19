<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RealEstate extends Model
{
    use HasFactory;

    // Many To Many
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
