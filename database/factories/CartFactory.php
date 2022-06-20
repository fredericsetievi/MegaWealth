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
            'id' => Str::uuid(),
            'userId' => User::get()->random()->id,
            'realEstateId' => RealEstate::get()->random()->id,
        ];
    }
}
