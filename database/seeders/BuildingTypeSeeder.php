<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\BuildingType;
use Illuminate\Database\Seeder;

class BuildingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BuildingType::create([
            'id' => Str::orderedUuid(),
            'name' => 'Apartment',
        ]);

        BuildingType::create([
            'id' => Str::orderedUuid(),
            'name' => 'House',
        ]);
    }
}
