<?php

namespace Database\Seeders;

use App\Models\RealEstate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(table: "real_estates")->insert([
            "id" => "1",
            "salesType" => "Sale",
            "buildingType" => "Apartement",
            "price" => 50000000,
            "location" => "Meikarta, Jakarta",
            "image" => '',
        ]);

        RealEstate::factory(10)->create();
    }
}
