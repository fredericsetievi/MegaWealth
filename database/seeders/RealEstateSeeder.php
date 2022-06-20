<?php

namespace Database\Seeders;

use App\Models\RealEstate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RealEstate::create([
            'id' => Str::uuid(),
            "salesType" => "Rent",
            "buildingType" => "Apartement",
            "price" => "500 / month",
            "location" => "Meikarta, Jakarta",
            "image" => 'real11.jpg',
        ]);

        RealEstate::create([
            'id' => Str::uuid(),
            "salesType" => "Rent",
            "buildingType" => "House",
            "price" => "700 / month",
            "location" => "Pluit, Jakarta",
            "image" => 'real1.jpg',
        ]);

        RealEstate::create([
            'id' => Str::uuid(),
            "salesType" => "Rent",
            "buildingType" => "Apartment",
            "price" => "600 / month",
            "location" => "PIK 1, Jakarta",
            "image" => 'real4.jpg',
        ]);

        RealEstate::create([
            'id' => Str::uuid(),
            "salesType" => "Rent",
            "buildingType" => "Apartment",
            "price" => "400 / month",
            "location" => "Rajawali, Jakarta",
            "image" => 'real6.jpg',
        ]);

        RealEstate::create([
            'id' => Str::uuid(),
            "salesType" => "Rent",
            "buildingType" => "Apartment",
            "price" => "1000 / month",
            "location" => "Gandaria, Jakarta",
            "image" => 'real10.jpg',
        ]);

        RealEstate::create([
            'id' => Str::uuid(),
            "salesType" => "Sale",
            "buildingType" => "House",
            "price" => "1300",
            "location" => "Bungur, Jakarta",
            "image" => 'real2.jpg',
        ]);

        RealEstate::create([
            'id' => Str::uuid(),
            "salesType" => "Sale",
            "buildingType" => "House",
            "price" => "1800",
            "location" => "Pondok Indah, Jakarta",
            "image" => 'real3.jpg',
        ]);

        RealEstate::create([
            'id' => Str::uuid(),
            "salesType" => "Sale",
            "buildingType" => "House",
            "price" => "2000",
            "location" => "Pondok Indah, Jakarta",
            "image" => 'real5.jpg',
        ]);

        RealEstate::create([
            'id' => Str::uuid(),
            "salesType" => "Sale",
            "buildingType" => "House",
            "price" => "2100",
            "location" => "PIK 2, Jakarta",
            "image" => 'real7.jpg',
        ]);

        RealEstate::create([
            'id' => Str::uuid(),
            "salesType" => "Sale",
            "buildingType" => "Apartment",
            "price" => "1600",
            "location" => "Pluit, Jakarta",
            "image" => 'real8.jpg',
        ]);

        RealEstate::create([
            'id' => Str::uuid(),
            "salesType" => "Sale",
            "buildingType" => "House",
            "price" => "1400",
            "location" => "Sunter, Jakarta",
            "image" => 'real9.jpg',
        ]);

        RealEstate::factory(50)->create();
    }
}
