<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\StatusRealEstate;

class StatusRealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusRealEstate::create([
            'id' => Str::orderedUuid(),
            'name' => 'Open',
        ]);

        StatusRealEstate::create([
            'id' => Str::orderedUuid(),
            'name' => 'Cart',
        ]);
        
        StatusRealEstate::create([
            'id' => Str::orderedUuid(),
            'name' => 'Transaction Completed',
        ]);
    }
}
