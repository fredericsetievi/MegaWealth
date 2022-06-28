<?php

namespace Database\Seeders;

use App\Models\SalesType;
use App\Models\RealEstate;
use Illuminate\Support\Str;
use App\Models\BuildingType;
use Illuminate\Database\Seeder;
use App\Models\StatusRealEstate;
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
        //SalesType
        $rentId = SalesType::where('name', '=', 'Rent')->first()->id;
        $saleId = SalesType::where('name', '=', 'Sale')->first()->id;

        //BuildingType
        $apartmentId = BuildingType::where('name', '=', 'Apartment')->first()->id;
        $houseId = BuildingType::where('name', '=', 'House')->first()->id;

        //StatusRealEstate
        $openId = StatusRealEstate::where('name', '=', 'open')->first()->id;

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $rentId,
            "buildingTypeId" => $apartmentId,
            "price" => 500,
            "location" => "Meikarta, Jakarta",
            "statusId" => $openId,
            "image" => 'real11.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $rentId,
            "buildingTypeId" => $houseId,
            "price" => 910,
            "location" => "Tanjung Duren, Jakarta",
            "statusId" => $openId,
            "image" => 'real14.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $rentId,
            "buildingTypeId" => $houseId,
            "price" => 430,
            "location" => "Pancoran, Jakarta",
            "statusId" => $openId,
            "image" => 'real15.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $rentId,
            "buildingTypeId" => $houseId,
            "price" => 700,
            "location" => "Pluit, Jakarta",
            "statusId" => $openId,
            "image" => 'real1.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $rentId,
            "buildingTypeId" => $apartmentId,
            "price" => 600,
            "location" => "PIK 1, Jakarta",
            "statusId" => $openId,
            "image" => 'real4.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $rentId,
            "buildingTypeId" => $apartmentId,
            "price" => 400,
            "location" => "Rajawali, Jakarta",
            "statusId" => $openId,
            "image" => 'real6.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $rentId,
            "buildingTypeId" => $apartmentId,
            "price" => 625,
            "location" => "Gandaria, Jakarta",
            "statusId" => $openId,
            "image" => 'real10.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $saleId,
            "buildingTypeId" => $houseId,
            "price" => 41300,
            "location" => "Bungur, Jakarta",
            "statusId" => $openId,
            "image" => 'real2.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $saleId,
            "buildingTypeId" => $houseId,
            "price" => 15800,
            "location" => "Pondok Indah, Jakarta",
            "statusId" => $openId,
            "image" => 'real3.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $saleId,
            "buildingTypeId" => $houseId,
            "price" => 45000,
            "location" => "Pondok Indah, Jakarta",
            "statusId" => $openId,
            "image" => 'real5.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $saleId,
            "buildingTypeId" => $houseId,
            "price" => 27100,
            "location" => "PIK 2, Jakarta",
            "statusId" => $openId,
            "image" => 'real7.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $saleId,
            "buildingTypeId" => $apartmentId,
            "price" => 19600,
            "location" => "Pluit, Jakarta",
            "statusId" => $openId,
            "image" => 'real8.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $saleId,
            "buildingTypeId" => $apartmentId,
            "price" => 50450,
            "location" => "Slipi, Jakarta",
            "statusId" => $openId,
            "image" => 'real12.jpg',
        ]);

        RealEstate::create([
            'id' => Str::orderedUuid(),
            "salesTypeId" => $saleId,
            "buildingTypeId" => $apartmentId,
            "price" => 61450,
            "location" => "Serpong, Tanggerang",
            "statusId" => $openId,
            "image" => 'real13.jpg',
        ]);

        RealEstate::factory(50)->create();
    }
}
