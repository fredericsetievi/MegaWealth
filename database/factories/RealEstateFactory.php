<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RealEstateFactory extends Factory
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
            'salesType' => $this->faker->randomElement(['Sale', 'Rent']),
            'buildingType' => $this->faker->randomElement(['Apartment', 'House']),
            'price' => $this->faker->numberBetween(100, 10000),
            'location' => $this->faker->address(),
            'status' => $this->faker->randomElement(['Open', 'Transaction Completed']),
            'image' => '',
        ];
    }
}
