@extends('layouts.main')

@section('content')
    <h1 class="ms-5 mt-4">Update Office</h1>
    <div class="d-flex justify-content-center mt-5">
        <div class="card me-3 shadow" style="width: 40rem;">
            <img src="{{ asset('storage/uploads/office/' . $office->image) }}" alt="Office Image"
                style="height:500px; object-fit: cover">
        </div>
        <div class="card border border-primary ms-3" style="width: 40rem;">
            <div class="card-body shadow">
                <form action="{{ route('updateOffice', $office->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Office Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter Office Name Here..." value="{{ old('name', $office->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Office Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Enter Office Address Here..."
                            value="{{ old('address', $office->address) }}"required>
                    </div>
                    <div class="mb-3">
                        <label for="contactName" class="form-label">Contact Name</label>
                        <input type="text" class="form-control" id="contactName" name="contactName"
                            placeholder="Enter Office Contact Name Here..."
                            value="{{ old('contactName', $office->contactName) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter Office Phone Number Here..." value="{{ old('phone', $office->phone) }}"
                            required>
                    </div>
                    {{-- Error Message --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    {{-- Update Button --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </div>
        </div>
    </div>
@endsection
