<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\RealEstate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    const SALES_TYPE = ['Sale', 'Rent'];
    const BUILDING_TYPE = ['House', 'Apartment'];

    public function buy()
    {
        $realEstates = RealEstate::where('salesType', '=', 'Sale')->where('status', '=', 'Open')->paginate(4);

        $data = [
            'title' => 'Buy',
            'realEstates' => $realEstates
        ];

        return view('realEstate.searchBuyRent', $data);
    }

    public function rent()
    {
        $realEstates = RealEstate::where('salesType', '=', 'Rent')->where('status', '=', 'Open')->paginate(4);

        $data = [
            'title' => 'Rent',
            'realEstates' => $realEstates
        ];

        return view('realEstate.searchBuyRent', $data);
    }

    public function addToCart($realEstateId)
    {
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
        $realEstate->status = 'Cart';
        $realEstate->save();

        return redirect()->back()->with('success', 'Real Estate added to cart successfully');
    }

    public function cart()
    {
        $cart = Cart::where('userId', '=', auth()->user()->id)->get();
        $realEstates = RealEstate::latest()->whereIn('id', $cart->pluck('realEstateId'))->where('status', '=', 'Cart')->paginate(4);
        $data = [
            'title' => 'Cart',
            'realEstates' => $realEstates,
        ];

        return view('realEstate.cart', $data);
    }

    public function removeFromCart($realEstateId)
    {
        $realEstate = RealEstate::where('id', '=', $realEstateId)->first();
        $realEstate->status = 'Open';
        $realEstate->save();

        $cart = Cart::where('userId', '=', auth()->user()->id)->where('realEstateId', '=', $realEstateId)->first();
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
        $realEstates = RealEstate::paginate(4);

        $data = [
            'realEstates' => $realEstates
        ];
        return view('manageRealEstate.index', $data);
    }

    public function create()
    {
        $data = [
            'salesTypes' => self::SALES_TYPE,
            'buildingTypes' => self::BUILDING_TYPE,
        ];
        return view('manageRealEstate.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'salesType' => 'required|in:' . implode(',', self::SALES_TYPE),
            'buildingType' => 'required|in:' . implode(',', self::BUILDING_TYPE),
            'price' => 'required',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $realEstate = new RealEstate();
        $realEstate->id = Str::orderedUuid();
        $realEstate->salesType = $request->salesType;
        $realEstate->buildingType = $request->buildingType;
        $realEstate->price = $request->price;
        $realEstate->location = $request->location;

        $extImage = $request->image->getClientOriginalExtension();
        $nameImage = "realEstate" . time() . "." . $extImage;
        $moveImage = $request->image->storeAs('public/uploads/realEstate', $nameImage);
        $realEstate->image = $nameImage;

        $realEstate->save();

        return  redirect()->route('manageRealEstatePage');
    }

    public function edit($id)
    {
        $realEstate = RealEstate::find($id);

        $data = [
            'salesTypes' => self::SALES_TYPE,
            'buildingTypes' => self::BUILDING_TYPE,
            'realEstate' => $realEstate,
        ];

        return view('manageRealEstate.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'salesType' => 'required|in:' . implode(',', self::SALES_TYPE),
            'buildingType' => 'required|in:' . implode(',', self::BUILDING_TYPE),
            'price' => 'required',
            'location' => 'required',
        ]);

        $realEstate = RealEstate::find($id);
        $realEstate->salesType = $request->salesType;
        $realEstate->buildingType = $request->buildingType;
        $realEstate->price = $request->price;
        $realEstate->location = $request->location;
        $realEstate->save();

        return redirect()->route('manageRealEstatePage');
    }

    public function finish($id)
    {
        $realEstate = RealEstate::find($id);
        if ($realEstate->status == 'Cart') {
            //YG DI CART DI HAPUS?
            $cart = Cart::where('realEstateId', '=', $id)->first();
            $cart->delete();

            $realEstate->status = 'Transaction Completed';
            $realEstate->save();
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        //YG DI CART DI HAPUS?
        $cart = Cart::where('realEstateId', '=', $id)->first();
        $cart->delete();

        $realEstate = RealEstate::find($id);
        $realEstate->delete();

        return redirect()->back();
    }

    public function searchResult(Request $request)
    {
        $realEstates = RealEstate::where('status', '=', 'Open')
            ->where('location', 'like', '%' . $request->search . '%')
            ->orWhere('buildingType', 'like', '%' . $request->search . '%')
            ->orWhere('salesType', 'like', '%' . $request->search . '%')
            ->paginate(4);

        $data = [
            'title' => 'Search Result',
            'realEstates' => $realEstates,
        ];

        return view('realEstate.searchBuyRent', $data);
    }
}
