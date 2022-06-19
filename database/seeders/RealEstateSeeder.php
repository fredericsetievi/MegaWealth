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
            "salesType" => "Rent",
            "buildingType" => "Apartement",
            "price" => "500 / month",
            "location" => "Meikarta, Jakarta",
            "image" => '',
        ]);

        RealEstate::factory(50)->create();
    }
}
