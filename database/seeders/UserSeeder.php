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
        User::create([
            'id' => Str::orderedUuid(),
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "role" => "Admin",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::create([
            'id' => Str::orderedUuid(),
            "name" => "Member",
            "email" => "member@gmail.com",
            "password" => bcrypt("password"),
            "role" => "Member",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        User::factory(5)->create();
    }
}
