@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-center mt-5 mx-5">
        <div class="card border border-primary" style="width: 50rem;">
            <div class="card-body">
                <h1>Add Real Estate</h1>
                <form action="{{ route('storeRealEstate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="salesTypeId" class="form-label">Sales Type</label>
                        <select class="form-select" aria-label="Default select example" id="salesTypeId" name="salesTypeId">
                            <option value="">Choose the type of sales</option>
                            @foreach ($salesTypes as $salesType)
                                <option value="{{ $salesType->id }}"
                                    {{ old('salesTypeId') == $salesType->id ? 'selected' : '' }}>
                                    {{ $salesType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="buildingTypeId" class="form-label">Building Type</label>
                        <select class="form-select" aria-label="Default select example" id="buildingTypeId"
                            name="buildingTypeId">
                            <option value="">Choose the building type</option>
                            @foreach ($buildingTypes as $buildingType)
                                <option value="{{ $buildingType->id }}"
                                    {{ old('buildingTypeId') == $buildingType->id ? 'selected' : '' }}>
                                    {{ $buildingType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price"
                            placeholder="Enter Real Estate Price Here..." value="{{ old('price') }}">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location"
                            placeholder="Enter Real Estate Location Here..." value="{{ old('location') }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload the Image</label>
                        <input type="file" class="form-control" id="image" name="image"
                            placeholder="Enter Real Estate Image Number Here...">
                    </div>
                    {{-- Error Message --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    {{-- Insert Button --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
            </div>
        </div>
    </div>
@endsection
