<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\RealEstate;
use Illuminate\Database\Seeder;
use App\Models\StatusRealEstate;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cartId = StatusRealEstate::where('name', '=', 'Cart')->first()->id;

        $carts = Cart::factory(30)->create();

        foreach ($carts as $cart) {
            $realEstate = RealEstate::where('id', $cart->realEstateId)->first();
            $realEstate->statusId = $cartId;
            $realEstate->save();
        }
    }
}
