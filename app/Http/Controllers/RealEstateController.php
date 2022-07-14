<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\SalesType;
use App\Models\RealEstate;
use App\Models\Transaction;
use App\Models\DetailTransaction;
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
            'Sale' => SalesType::where('name', 'Sale')->first(),
            'Rent' => SalesType::where('name', 'Rent')->first(),
        ];

        $this->BUILDING_TYPE = [
            'House' => BuildingType::where('name', 'House')->first(),
            'Apartment' => BuildingType::where('name', 'Apartment')->first(),
        ];


        $this->STATUS = [
            'Open' => StatusRealEstate::where('name', 'Open')->first(),
            'Cart' => StatusRealEstate::where('name', 'Cart')->first(),
            'Completed' => StatusRealEstate::where('name', 'Transaction Completed')->first(),
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
        $realEstates = RealEstate::where('salesTypeId', $this->SALES_TYPE['Sale']->id)->where('statusId', $this->STATUS['Open']->id)->paginate(4);

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
        $realEstates = RealEstate::where('salesTypeId', $this->SALES_TYPE['Rent']->id)->where('statusId', $this->STATUS['Open']->id)->paginate(4);

        $data = [
            'title' => 'Rent',
            'saleId' => $this->SALES_TYPE['Sale']->id,
            'rentId' => $this->SALES_TYPE['Rent']->id,
            'realEstates' => $realEstates
        ];

        return view('realEstate.searchBuyRent', $data);
    }

    public function index()
    {
        $realEstates = RealEstate::paginate(4);

        $data = [
            'realEstates' => $realEstates,
            'cartId' => $this->STATUS['Cart']->id,
            'completedId' => $this->STATUS['Completed']->id,
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

        return  redirect()->route('manageRealEstatePage')->with('success', 'Real Estate is successfully added');
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

        return redirect()->route('manageRealEstatePage')->with('success', 'Real Estate is successfully updated');
    }

    public function finish($id)
    {
        $realEstate = RealEstate::find($id);
        if ($realEstate->statusId == $this->STATUS['Cart']->id) {
            // delete real estate on user cart
            $cart = Cart::where('realEstateId', $id)->first();
            $cart->delete();

            // add new transaction
            $transactionId = Str::orderedUuid();

            $transaction = new Transaction();
            $transaction->id = $transactionId;
            $transaction->userId = $cart->userId;
            $transaction->save();

            // add detail transaction
            $detailTransaction = new DetailTransaction();
            $detailTransaction->id = Str::orderedUuid();
            $detailTransaction->transactionId = $transactionId;
            $detailTransaction->realEstateId = $id;
            $detailTransaction->save();

            // update real estate status to completed
            $realEstate->statusId = $this->STATUS['Completed']->id;
            $realEstate->save();
        }

        return redirect()->back()->with('success', 'Real Estate successfully updated!');
    }

    public function destroy($id)
    {
        $realEstate = RealEstate::find($id);

        if ($realEstate->statusId == $this->STATUS['Completed']->id) {
            return redirect()->back()->with('error', 'Transaction is completed, you can not delete real estate!');
        }

        $cart = Cart::where('realEstateId', $id)->first();
        if ($cart != NULL) {
            $cart->delete();
        }

        $realEstate->delete();

        return redirect()->back()->with('success', 'Real Estate is successfully deleted');
    }

    public function searchResult(Request $request)
    {
        if ($request->search == '') {
            return redirect()->back()->with('error', 'Please enter keyword to search!');
        } else if (str_contains('buy', strtoLower($request->search))) {
            $request->search = 'Sale';
        }

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
                'completedId' => $this->STATUS['Completed']->id,
            ];

            return view('manageRealEstate.index', $data);
        } else {
            $realEstates = RealEstate::where('statusId', $this->STATUS['Open']->id)
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
