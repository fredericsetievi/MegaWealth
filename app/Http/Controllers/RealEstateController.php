<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\RealEstate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    public function buy()
    {
        $realEstates = RealEstate::where('salesType', '=', 'Sale')->paginate(4);

        $data = [
            'title' => 'Buy',
            'realEstates' => $realEstates
        ];

        return view('buyAndRent.index', $data);
    }

    public function rent()
    {
        $realEstates = RealEstate::where('salesType', '=', 'Rent')->paginate(4);

        $data = [
            'title' => 'Rent',
            'realEstates' => $realEstates
        ];

        return view('buyAndRent.index', $data);
    }

    public function addToCart($realEstateId)
    {
        $alreadyHas = Cart::where('userId', '=', auth()->user()->id)->where('realEstateId', '=', $realEstateId)->first();
        if ($alreadyHas) {
            return redirect()->back()->with('error', 'You already have this item in your cart');
        }

        $cart = new Cart();
        $cart->id = Str::uuid();
        $cart->userId = auth()->user()->id;
        $cart->realEstateId = $realEstateId;
        $cart->save();

        return redirect()->route('cartPage');
    }

    public function cart()
    {
        $cart = Cart::where('userId', '=', auth()->user()->id)->get();
        $realEstates = RealEstate::whereIn('id', $cart->pluck('realEstateId'))->paginate(4);
        $data = [
            'title' => 'Cart',
            'realEstates' => $realEstates,
        ];

        return view('realEstate.cart', $data);
    }

    public function removeFromCart($realEstateId)
    {
        $cart = Cart::where('userId', '=', auth()->user()->id)->where('realEstateId', '=', $realEstateId)->first();
        $cart->delete();

        return redirect()->route('cartPage');
    }

    public function checkoutCart()
    {
        $cart = Cart::where('userId', '=', auth()->user()->id)->get();
        foreach ($cart as $item) {
            $item->delete();
        }

        return redirect()->route('homePage')->with('success', 'Checkout Successful');
    }

    public function index()
    {
        $realEstates = RealEstate::paginate(4);

        $data = [
            'realEstates' => $realEstates
        ];
        return view('realEstate.index', $data);
    }

    public function create()
    {
        // //
        // 'id' => Str::orderedUuid(),
        // 'salesType' => $this->faker->randomElement(['Sale', 'Rent']),
        // 'buildingType' => $this->faker->randomElement(['Apartment', 'House']),
        // 'price' => $this->faker->numberBetween(10000000, 1000000000),
        // 'location' => $this->faker->address(),
        // 'image' => '',
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function finish($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
