<?php

namespace Database\Factories;

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
            'userId' => $this->faker->numberBetween(1, 21),
            'realEstateId' => $this->faker->numberBetween(1, 51),
        ];
    }
}
