<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $uuid = User::all()->random()->id;
        //error_log(print_r($uuid, true)); //jadiny int, bukan uuid string

        return [
            "transaction_id" => $this->faker->uuid,
            "user_id" => "1",
            "username" => $this->faker->name,
            "price" => $this->faker->numberBetween(10000, 100000),
            "item_name" => $this->faker->word
        ];
    }
}
