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

        return view('realEstate.index', $data);
    }

    public function rent()
    {
        $realEstates = RealEstate::where('salesType', '=', 'Rent')->paginate(4);

        $data = [
            'title' => 'Rent',
            'realEstates' => $realEstates
        ];

        return view('realEstate.index', $data);
    }

    public function addToCart($realEstateId)
    {
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manageRealEstate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
