<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\RealEstate;
use App\Models\StatusRealEstate;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    private $openId, $cartId;

    // public function __construct()
    // {
    //     $this->openId = StatusRealEstate::where('name', '=', 'Open')->first()->id;
    //     $this->cartId = StatusRealEstate::where('name', '=', 'Cart')->first()->id;
    // }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $openId = StatusRealEstate::where('name', '=', 'Open')->first()->id;
        $cartId = StatusRealEstate::where('name', '=', 'Cart')->first()->id;

        $randomRealEstate = RealEstate::where('statusId', $openId)->inRandomOrder()->first();
        $randomRealEstate->statusId = $cartId;
        $randomRealEstate->save();

        return [
            'id' => Str::orderedUuid(),
            'userId' => User::where('role', '!=', 'Admin')->inRandomOrder()->first()->id,
            'realEstateId' => $randomRealEstate->id,
        ];
    }
}
