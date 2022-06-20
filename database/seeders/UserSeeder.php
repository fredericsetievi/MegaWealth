<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'id' => Str::uuid(),
            "name" => "Frederic",
            "email" => "frederic@gmail.com",
            "password" => bcrypt("password"),
            "role" => "admin",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::factory(20)->create();
    }
}
