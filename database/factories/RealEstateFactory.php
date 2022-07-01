<?php

namespace Database\Factories;

use App\Models\SalesType;
use Illuminate\Support\Str;
use App\Models\BuildingType;
use App\Models\StatusRealEstate;
use Illuminate\Database\Eloquent\Factories\Factory;

class RealEstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $salesType =  SalesType::all()->random()->id;
        if ($salesType == SalesType::where('name', '=', 'Rent')->first()->id) {
            $price = $this->faker->numberBetween(50, 1000);
        } else if ($salesType == SalesType::where('name', '=', 'Sale')->first()->id) {
            $price = $this->faker->numberBetween(1000, 100000);
        }
        $buildingType = BuildingType::all()->random()->id;
        if ($buildingType == BuildingType::where('name', '=', 'Apartment')->first()->id) {
            $image = 'apartment.jpg';
        } else if ($buildingType == BuildingType::where('name', '=', 'House')->first()->id) {
            $image = 'house.jpg';
        }
        $openId = StatusRealEstate::where('name', '=', 'Open')->first()->id;

        return [
            'id' => Str::orderedUuid(),
            'salesTypeId' => $salesType,
            'buildingTypeId' => $buildingType,
            'price' => $price,
            'location' => $this->faker->address(),
            'statusId' => $openId,
            'image' => $image,
        ];
    }
}
