<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\RealEstate;
use App\Models\StatusRealEstate;
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
        $openId = StatusRealEstate::where('name', '=', 'Open')->first()->id;

        return [
            'id' => Str::orderedUuid(),
            'userId' => User::where('role', '!=', 'Admin')->inRandomOrder()->first()->id,
            'realEstateId' => RealEstate::where('statusId', $openId)->get()->random()->id,
        ];
    }
}
