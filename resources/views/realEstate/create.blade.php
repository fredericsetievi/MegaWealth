@extends('layouts.admin.main')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card border border-primary" style="width: 50rem;">
            <div class="card-body">
                <h1>Add Real Estate</h1>
                <form action="{{ route('storeRealEstate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="salesType" class="form-label">Sales Type</label>
                        <select class="form-select" aria-label="Default select example" id="salesType" name="salesType"
                            required>
                            <option value="">Choose the type of sales</option>
                            @foreach ($salesTypes as $salesType)
                                <option value="{{ $salesType }}"
                                    {{ old('salesType') == $salesType ? 'selected' : '' }}>
                                    {{ $salesType }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="buildingType" class="form-label">Building Type</label>
                        <select class="form-select" aria-label="Default select example" id="buildingType"
                            name="buildingType" required>
                            <option value="">Choose the building type</option>
                            @foreach ($buildingTypes as $buildingType)
                                <option value="{{ $buildingType }}"
                                    {{ old('buildingType') == $buildingType ? 'selected' : '' }}>{{ $buildingType }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price"
                            placeholder="Enter Real Estate Price Here..." value="{{ old('price') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location"
                            placeholder="Enter Real Estate Location Here..." value="{{ old('location') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload the Image</label>
                        <input type="file" class="form-control" id="image" name="image"
                            placeholder="Enter Real Estate Image Number Here..." required>
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
