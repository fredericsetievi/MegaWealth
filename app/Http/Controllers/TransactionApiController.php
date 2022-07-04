<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RealEstate;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class TransactionApiController extends Controller
{
    public function show($email)
    {
        $user = User::where('email', $email)->get();
        $transactions = Transaction::where('userId', $user->id)->get();

        $data = new Collection();
        foreach ($transactions as $transaction) {
            $realEstate = RealEstate::where('id', $transaction->realEstateId)->get();
            $newData = [
                'transaction_date' => $transaction->created_at->toDateString(),
                'transaction_id' => $transaction->id,
                'id' => $realEstate->id,
                'type_of_sales' => $realEstate->salesType->name,
                'building_type' => $realEstate->buildingType->name,
                'price' => $realEstate->price,
                'location' => $realEstate->location,
                'image_path' => 'uploads/realEstate/' . $realEstate->image,
            ];
            $data->push($newData);
        }


        return response()->json([
            'data' => $data,
            'user_id' => [
                'id' => $user->id
            ]
        ]);
    }
}
