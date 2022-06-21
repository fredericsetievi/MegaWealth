<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\RealEstate;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carts = Cart::factory(20)->create();

        foreach ($carts as $cart) {
            $realEstate = RealEstate::where('id', $cart->realEstateId)->first();
            $realEstate->status = 'Cart';
            $realEstate->save();
        }
    }
}
