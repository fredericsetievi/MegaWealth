<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OfficeFactory extends Factory
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
            'name' => $this->faker->company(),
            'address' => $this->faker->address(),
            'contactName' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'image' => '',
        ];
    }
}
