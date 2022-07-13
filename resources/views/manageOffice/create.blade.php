@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-center mt-5 mx-5">
        <div class="card border border-primary" style="width: 50rem;">
            <div class="card-body">
                <h1>Add Office</h1>
                <form action="{{ route('storeOffice') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Office Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter Office Name Here..." value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Office Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Enter Office Address Here..." value="{{ old('address') }}">
                    </div>
                    <div class="mb-3">
                        <label for="contactName" class="form-label">Contact Name</label>
                        <input type="text" class="form-control" id="contactName" name="contactName"
                            placeholder="Enter Office Contact Name Here..." value="{{ old('contactName') }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter Office Phone Number Here..." value="{{ old('phone') }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload the Image</label>
                        <input type="file" class="form-control" id="image" name="image"
                            placeholder="Enter Office Image Number Here...">
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
