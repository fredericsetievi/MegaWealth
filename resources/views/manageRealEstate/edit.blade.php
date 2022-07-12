@extends('layouts.main')

@section('content')
    <h1 class="ms-5 mt-4">Update Real Estate</h1>
    <div class="d-flex justify-content-center mt-5 mx-5">
        <div class="card me-3 shadow" style="width: 40rem;">
            <img src="{{ asset('storage/uploads/realEstate/' . $realEstate->image) }}" alt="Real Estate Image"
                style="height:500px; object-fit: cover">
        </div>
        <div class="card border border-primary ms-3" style="width: 40rem;">
            <div class="card-body shadow">
                <h1>Add Real Estate</h1>
                <form action="{{ route('updateRealEstate', $realEstate->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="salesTypeId" class="form-label">Sales Type</label>
                        <select class="form-select" aria-label="Default select example" id="salesTypeId" name="salesTypeId"
                            required>
                            <option value="">Choose the type of sales</option>
                            @foreach ($salesTypes as $salesType)
                                <option value="{{ $salesType->id }}"
                                    {{ (old('salesTypeId') == $salesType->id ? 'selected' : $salesType->id == $realEstate->salesTypeId) ? 'selected' : '' }}>
                                    {{ $salesType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="buildingType" class="form-label">Building Type</label>
                        <select class="form-select" aria-label="Default select example" id="buildingType"
                            name="buildingTypeId" required>
                            <option value="">Choose the building type</option>
                            @foreach ($buildingTypes as $buildingType)
                                <option value="{{ $buildingType->id }}"
                                    {{ (old('buildingTypeId') == $buildingType->id
                                            ? 'selected'
                                            : $buildingType->id == $realEstate->buildingTypeId)
                                        ? 'selected'
                                        : '' }}>
                                    {{ $buildingType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price"
                            placeholder="Enter Real Estate Price Here..." value="{{ old('price', $realEstate->price) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location"
                            placeholder="Enter Real Estate Location Here..."
                            value="{{ old('location', $realEstate->location) }}" required>
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
