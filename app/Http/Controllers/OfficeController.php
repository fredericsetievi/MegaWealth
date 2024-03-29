<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Support\Str;
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

    public function index()
    {
        $offices = Office::paginate(4);

        $data = [
            'title' => 'Manage Company',
            'offices' => $offices
        ];

        return view('manageOffice.index', $data);
    }

    public function create()
    {
        return view('manageOffice.create');
    }

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
        $office->id = Str::orderedUuid();
        $office->name = $request->name;
        $office->address = $request->address;
        $office->contactName = $request->contactName;
        $office->phone = $request->phone;

        $extImage = $request->image->getClientOriginalExtension();
        $nameImage = "office" . time() . "." . $extImage;
        $moveImage = $request->image->storeAs('public/uploads/office', $nameImage);
        $office->image = $nameImage;

        $office->save();

        return  redirect()->route('manageOfficePage')->with('success', 'Office is successfully added');
    }

    public function edit($id)
    {
        $office = Office::find($id);

        return view('manageOffice.edit', compact('office'));
    }

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

        return  redirect()->route('manageOfficePage')->with('success', 'Office is successfully updated');
    }

    public function destroy($id)
    {
        $office = Office::find($id);
        $office->delete();

        return redirect()->back()->with('success', 'Office is successfully deleted');
    }
}
