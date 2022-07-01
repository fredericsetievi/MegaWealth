<?php

namespace Database\Seeders;

use App\Models\SalesType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SalesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalesType::create([
            'id' => Str::orderedUuid(),
            'name' => 'Rent',
        ]);

        SalesType::create([
            'id' => Str::orderedUuid(),
            'name' => 'Sale',
        ]);
    }
}
