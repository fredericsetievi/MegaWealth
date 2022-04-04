<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // panggil seeder dari model yang ingin dijalankan
        $this->call([
            UserSeeder::class,     //mesti dibuat dulu userseedernya karena ada foreign key untuk table transactions
            TransactionSeeder::class
        ]);
    }
}
