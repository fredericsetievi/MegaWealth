@extends('layouts.admin.main')

@section('content')
    <h1>Update Office</h1>
    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 50rem;">
            <img src="" alt="Office Image">
        </div>
        <div class="card" style="width: 50rem;">
            <div class="card-body">
                <form action="{{ route('updateOffice', $office->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Office Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter Your Name Here..." required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Office Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Enter Your Address Here..." required>
                    </div>
                    <div class="mb-3">
                        <label for="contactName" class="form-label">Contact Name</label>
                        <input type="text" class="form-control" id="contactName" name="contactName"
                            placeholder="Enter Your Contact Name Here..." required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter Your Phone Number Here..." required>
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
