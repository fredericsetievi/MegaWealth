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
        $realEstates = RealEstate::where('salesType', '=', 'Sale')->where('status', '=', 'Open')->paginate(4);

        $data = [
            'title' => 'Buy',
            'realEstates' => $realEstates
        ];

        return view('buyAndRent.index', $data);
    }

    public function rent()
    {
        $realEstates = RealEstate::where('salesType', '=', 'Rent')->where('status', '=', 'Open')->paginate(4);

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

        $realEstate = RealEstate::where('id', '=', $cart->realEstateId)->first();
        $realEstate->status = 'Cart';
        $realEstate->save();

        return redirect()->route('cartPage');
    }

    public function cart()
    {
        $cart = Cart::where('userId', '=', auth()->user()->id)->get();
        $realEstates = RealEstate::whereIn('id', $cart->pluck('realEstateId'))->where('status', '=', 'Cart')->paginate(4);
        $data = [
            'title' => 'Cart',
            'realEstates' => $realEstates,
        ];

        return view('realEstate.cart', $data);
    }

    public function removeFromCart($realEstateId)
    {
        $cart = Cart::where('userId', '=', auth()->user()->id)->where('realEstateId', '=', $realEstateId)->first();
        $realEstate = RealEstate::where('id', '=', $realEstateId)->first();
        $realEstate->status = 'Open';
        $realEstate->save();
        $cart->delete();

        return redirect()->route('cartPage');
    }

    public function checkoutCart()
    {
        $cart = Cart::where('userId', '=', auth()->user()->id)->get();

        foreach ($cart as $item) {
            $realEstate = RealEstate::where('id', '=', $item->realEstateId)->first();
            $realEstate->status = 'Open';
            $realEstate->save();
            $item->delete();
        }

        return redirect()->route('homePage')->with('success', 'Checkout Successful');
    }

    public function index()
    {
        $realEstates = RealEstate::where('status', '=', 'Open')->paginate(4);

        $data = [
            'realEstates' => $realEstates
        ];
        return view('realEstate.index', $data);
    }

    public function create()
    {
        return view('realEstate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'salesType' => 'required',
            'buildingType' => 'required',
            'price' => 'required',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $realEstate = new RealEstate();
        $realEstate->salesType = $request->salesType;
        $realEstate->buildingType = $request->buildingType;
        $realEstate->price = $request->price;
        $realEstate->location = $request->location;


        $extImage = $request->berkas->getClientOriginalExtension();
        $nameImage = "realEstate" . time() . "." . $extImage;
        $moveImage = $request->berkas->storeAs('public/uploads/realEstate', $nameImage);
        $realEstate->image = asset('storage/uploads/realEstate/' . $nameImage);

        $realEstate->save();

        return  redirect()->route('manageRealEstatePage');
    }

    public function edit($id)
    {
        $realEstate = RealEstate::find($id);

        return view('realEstate.edit', compact('realEstate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'salesType' => 'required',
            'buildingType' => 'required',
            'price' => 'required',
            'location' => 'required',
        ]);

        $realEstate = RealEstate::find($id);
        $realEstate->salesType = $request->salesType;
        $realEstate->buildingType = $request->buildingType;
        $realEstate->price = $request->price;
        $realEstate->location = $request->location;
        $realEstate->save();

        return  redirect()->route('manageRealEstatePage');
    }

    public function finish($id)
    {
        $realEstate = RealEstate::find($id);
        if ($realEstate->status == 'Cart') {
            $realEstate->status = 'Transaction Completed';
            $realEstate->save();
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $realEstate = RealEstate::find($id);
        $realEstate->delete();

        return redirect()->back();
    }
}
