@extends('layouts.admin.main')

@section('content')
    <h1>Update Real Estate</h1>
    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 50rem;">
            <img src="" alt="Office Image">
        </div>
        <div class="card border border-primary" style="width: 50rem;">
            <div class="card-body">
                <h1>Add Real Estate</h1>
                <form action="{{ route('updateRealEstate', $realEstate->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="salesType" class="form-label">Sales Type</label>
                        <select class="form-select" aria-label="Default select example" id="salesType" name="salesType"
                            required>
                            {{-- value= --}}
                            <option value="">Choose the type of sales</option>
                            <option value="Sale">Sale</option>
                            <option value="Rent">Rent</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="buildingType" class="form-label">Building Type</label>
                        <select class="form-select" aria-label="Default select example" id="buildingType"
                            name="buildingType" required>
                            {{-- value= --}}
                            <option value="">Choose the building type</option>
                            <option value="Apartement">Apartement</option>
                            <option value="House">House</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price"
                            placeholder="Enter Real Estate Price Here..." value="{{ $realEstate->price }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location"
                            placeholder="Enter Real Estate Location Here..." value="{{ $realEstate->location }}" required>
                    </div>
                    {{-- Error Message --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    {{-- Insert Button --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </div>
        </div>
    </div>
@endsection
