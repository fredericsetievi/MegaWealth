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
        Cart::factory(15)->create();
    }
}
