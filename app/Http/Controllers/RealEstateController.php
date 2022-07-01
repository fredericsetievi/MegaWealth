<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\SalesType;
use App\Models\RealEstate;
use Illuminate\Support\Str;
use App\Models\BuildingType;
use Illuminate\Http\Request;
use App\Models\StatusRealEstate;
use Illuminate\Support\Facades\Gate;

class RealEstateController extends Controller
{
    private $SALES_TYPE, $BUILDING_TYPE, $STATUS;
    private $sales_type_id, $building_type_id;

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

    public function buy()
    {
        $realEstates = RealEstate::where('salesTypeId', '=', $this->SALES_TYPE['Sale']->id)->where('statusId', '=', $this->STATUS['Open']->id)->paginate(4);

        $data = [
            'title' => 'Buy',
            'saleId' => $this->SALES_TYPE['Sale']->id,
            'rentId' => $this->SALES_TYPE['Rent']->id,
            'realEstates' => $realEstates
        ];

        return view('realEstate.searchBuyRent', $data);
    }

    public function rent()
    {
        $realEstates = RealEstate::where('salesTypeId', '=', $this->SALES_TYPE['Rent']->id)->where('statusId', '=', $this->STATUS['Open']->id)->paginate(4);

        $data = [
            'title' => 'Rent',
            'saleId' => $this->SALES_TYPE['Sale']->id,
            'rentId' => $this->SALES_TYPE['Rent']->id,
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
        $realEstate->statusId = $this->STATUS['Cart']->id;
        $realEstate->save();

        return redirect()->back()->with('success', 'Real Estate added to cart successfully');
    }

    public function cart()
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

    public function removeFromCart($realEstateId)
    {
        $realEstate = RealEstate::where('id', '=', $realEstateId)->first();
        $realEstate->statusId = $this->STATUS['Open']->id;
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
            $realEstate->statusId = $this->STATUS['Completed']->id;
            $realEstate->save();
            $item->delete();
        }

        return redirect()->route('homePage')->with('success', 'Checkout Successful');
    }

    public function index()
    {
        $realEstates = RealEstate::paginate(4);

        $data = [
            'realEstates' => $realEstates,
            'cartId' => $this->STATUS['Cart']->id,
        ];

        return view('manageRealEstate.index', $data);
    }

    public function create()
    {
        $data = [
            'salesTypes' => $this->SALES_TYPE,
            'buildingTypes' => $this->BUILDING_TYPE,
        ];
        return view('manageRealEstate.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'salesTypeId' => 'required|in:' . $this->sales_type_id->implode(','),
            'buildingTypeId' => 'required|in:' . $this->building_type_id->implode(','),
            'price' => 'required|numeric',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $realEstate = new RealEstate();
        $realEstate->id = Str::orderedUuid();
        $realEstate->salesTypeId = $request->salesTypeId;
        $realEstate->buildingTypeId = $request->buildingTypeId;
        $realEstate->statusId = $this->STATUS['Open']->id;
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
            'salesTypes' => $this->SALES_TYPE,
            'buildingTypes' => $this->BUILDING_TYPE,
            'realEstate' => $realEstate,
        ];

        return view('manageRealEstate.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'salesTypeId' => 'required|in:' . $this->sales_type_id->implode(','),
            'buildingTypeId' => 'required|in:' . $this->building_type_id->implode(','),
            'price' => 'required|numeric',
            'location' => 'required',
        ]);

        $realEstate = RealEstate::find($id);
        $realEstate->salesTypeId = $request->salesTypeId;
        $realEstate->buildingTypeId = $request->buildingTypeId;
        $realEstate->price = $request->price;
        $realEstate->location = $request->location;
        $realEstate->save();

        return redirect()->route('manageRealEstatePage');
    }

    public function finish($id)
    {
        $realEstate = RealEstate::find($id);
        if ($realEstate->statusId == $this->STATUS['Cart']->id) {
            $cart = Cart::where('realEstateId', '=', $id)->first();
            $cart->delete();

            $realEstate->statusId = $this->STATUS['Completed']->id;
            $realEstate->save();
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $cart = Cart::where('realEstateId', '=', $id)->first();
        if ($cart != NULL) {
            $cart->delete();
        }

        $realEstate = RealEstate::find($id);
        $realEstate->delete();

        return redirect()->back();
    }

    public function searchResult(Request $request)
    {
        if (str_contains('buy', strtoLower($request->search))) {
            $request->search = 'Sale';
        }

        //MASI EROR - KENAPA ADMIN GA MUNCUL SEMUA PAS KLIK PAGINATE YG ERROR
        if (Gate::allows('isAdmin')) {
            $realEstates = RealEstate::where('location', 'like', '%' . $request->search . '%')
                ->orWhereHas('buildingType', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->orWhereHas('salesType', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->paginate(4);

            $data = [
                'title' => $request->search,
                'realEstates' => $realEstates,
                'cartId' => $this->STATUS['Cart']->id,
            ];

            return view('manageRealEstate.index', $data);
        } else {
            $realEstates = RealEstate::where('statusId', '=', $this->STATUS['Open']->id)
                ->where('location', 'like', '%' . $request->search . '%')
                ->orWhereHas('buildingType', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->orWhereHas('salesType', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->paginate(4);

            $data = [
                'title' =>  $request->search,
                'saleId' => $this->SALES_TYPE['Sale']->id,
                'rentId' => $this->SALES_TYPE['Rent']->id,
                'realEstates' => $realEstates,
            ];

            return view('realEstate.searchBuyRent', $data);
        }
    }
}
