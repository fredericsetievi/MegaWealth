<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tempat masukin isi dari table Transactions
        DB::table(table: "transactions")->insert([
            "transaction_id" => Str::uuid(),
            "user_id" => "1",
            "username" => "frederic",
            "price" => "10000",
            "item_name" => "Laptop",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        Transaction::factory(10)->create();
    }
}
