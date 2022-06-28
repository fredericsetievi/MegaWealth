<?php

namespace Database\Seeders;

use App\Models\RealEstate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            OfficeSeeder::class,
            BuildingTypeSeeder::class,
            SalesTypeSeeder::class,
            StatusRealEstateSeeder::class,
            RealEstateSeeder::class,
            CartSeeder::class,
        ]);
    }
}
