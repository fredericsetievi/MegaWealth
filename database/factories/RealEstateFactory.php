<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'salesType' => $this->faker->randomElement(['Sale', 'Rent']),
            'buildingType' => $this->faker->randomElement(['Apartment', 'House']),
            'price' => $this->faker->numberBetween(10000000, 1000000000),
            'location' => $this->faker->address(),
            'image' => '',
        ];
    }
}
