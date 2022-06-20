<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function displayOffice()
    {
        $offices = Office::paginate(5);

        $data = [
            'title' => 'About Us',
            'offices' => $offices
        ];

        return view('aboutUs.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::paginate(4);

        $data = [
            'title' => 'Manage Company',
            'offices' => $offices
        ];

        return view('office.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contactName' => 'required',
            'phone' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $office = new Office();
        $office->name = $request->name;
        $office->address = $request->address;
        $office->contactName = $request->contactName;
        $office->phone = $request->phone;


        $extImage = $request->berkas->getClientOriginalExtension();
        $nameImage = "office" . time() . "." . $extImage;
        $moveImage = $request->berkas->storeAs('public/uploads/office', $nameImage);
        $office->image = asset('storage/uploads/office/' . $nameImage);

        $office->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = Office::find($id);

        return view('office.edit', compact('office'));
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
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contactName' => 'required',
            'phone' => 'required',
        ]);

        $office = Office::find($id);
        $office->name = $request->name;
        $office->address = $request->address;
        $office->contactName = $request->contactName;
        $office->phone = $request->phone;
        $office->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = Office::find($id);
        $office->delete();

        return redirect()->back();
    }
}
