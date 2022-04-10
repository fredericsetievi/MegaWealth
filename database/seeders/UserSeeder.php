<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(table: "users")->insert([
            "id" => "1",
            "name" => "Frederic",
            "email" => "frederic@gmail.com",
            "password" => bcrypt("password"),
            "isAdmin" => "true",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::factory(10)->create();
    }
}
