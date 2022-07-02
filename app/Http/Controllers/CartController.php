<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\SalesType;
use App\Models\RealEstate;
use Illuminate\Support\Str;
use App\Models\BuildingType;
use Illuminate\Http\Request;
use App\Models\StatusRealEstate;

class CartController extends Controller
{
    public function __construct()
    {
        $this->SALES_TYPE = [
            'Sale' => SalesType::where('name', '=', 'Sale')->first(),
            'Rent' => SalesType::where('name', '=', 'Rent')->first(),
        ];

        $this->BUILDING_TYPE = [
            'House' => BuildingType::where('name', '=', 'House')->first(),
            'Apartment' => BuildingType::where('name', '=', 'Apartment')->first(),
        ];


        $this->STATUS = [
            'Open' => StatusRealEstate::where('name', '=', 'Open')->first(),
            'Cart' => StatusRealEstate::where('name', '=', 'Cart')->first(),
            'Completed' => StatusRealEstate::where('name', '=', 'Transaction Completed')->first(),
        ];

        $this->sales_type_id = collect();
        foreach ($this->SALES_TYPE as $key => $value) {
            $this->sales_type_id->push($value->id);
        }

        $this->building_type_id = collect();
        foreach ($this->BUILDING_TYPE as $key => $value) {
            $this->building_type_id->push($value->id);
        }
    }

    public function index()
    {
        $cart = Cart::where('userId', '=', auth()->user()->id)->get();
        $realEstates = RealEstate::latest()->whereIn('id', $cart->pluck('realEstateId'))->where('statusId', '=', $this->STATUS['Cart']->id)->paginate(4);
        $data = [
            'title' => 'Cart',
            'realEstates' => $realEstates,
            'saleId' => $this->SALES_TYPE['Sale']->id,
            'rentId' => $this->SALES_TYPE['Rent']->id,
        ];

        return view('realEstate.cart', $data);
    }

    public function store(Request $request)
    {
        $realEstateId = $request->realEstateId;

        $alreadyHasByOwn = Cart::where('userId', '=', auth()->user()->id)->where('realEstateId', '=', $realEstateId)->first();
        $alreadyHasByOther = Cart::where('realEstateId', '=', $realEstateId)->first();
        if ($alreadyHasByOwn) {
            return redirect()->back()->with('error', 'You already have this item in your cart');
        } else if ($alreadyHasByOther) {
            return redirect()->back()->with('error', 'This item is already in someone else\'s cart');
        }

        $cart = new Cart();
        $cart->id = Str::uuid();
        $cart->userId = auth()->user()->id;
        $cart->realEstateId = $realEstateId;
        $cart->save();

        $realEstate = RealEstate::where('id', '=', $cart->realEstateId)->first();
        $realEstate->statusId = $this->STATUS['Cart']->id;
        $realEstate->save();

        return redirect()->back()->with('success', 'Real Estate added to cart successfully');
    }

    public function destroy($realEstateId)
    {
        $realEstate = RealEstate::where('id', '=', $realEstateId)->first();
        $realEstate->statusId = $this->STATUS['Open']->id;
        $realEstate->save();

        $cart = Cart::where('userId', '=', auth()->user()->id)->where('realEstateId', '=', $realEstateId)->first();
        $cart->delete();

        return redirect()->route('cartPage');
    }

    public function checkout($userId)
    {
        $cart = Cart::where('userId', '=', $userId)->get();

        foreach ($cart as $item) {
            $realEstate = RealEstate::where('id', '=', $item->realEstateId)->first();
            $realEstate->statusId = $this->STATUS['Completed']->id;
            $realEstate->save();
            $item->delete();
        }

        return redirect()->route('homePage')->with('success', 'Checkout Successful');
    }
}
