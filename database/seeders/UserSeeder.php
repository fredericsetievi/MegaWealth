<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        //
        DB::table(table: "users")->insert([
            "id" => "1",
            "name" => "Frederic",
            "email" => "frederic@gmail.com",
            "email_verified_at" => Carbon::now(),
            "password" => bcrypt("secret"),
        ]);

        User::factory(10)->create();
    }
}
