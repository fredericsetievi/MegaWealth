<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\RealEstate;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::orderedUuid(),
            'userId' => User::all()->random()->id,
            'realEstateId' => RealEstate::where('status', 'Open')->get()->random()->id,
        ];
    }
}
