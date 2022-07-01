@extends('layouts.main')

@section('content')
    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card bg-dark text-white mb-3">
        <img src="{{ asset('storage/assets/bannerHome.jpg') }}" class="card-img" alt="Office Image" style="height: 450px">
        <div class="card-img-overlay text-center">
            <h1 style="margin-top:50px">Find Your Future Home</h1>
            <form action="{{ route('searchResultPage') }}" method="GET" style="margin-top: 100px">
                <div class="search-group d-flex">
                    <div class="col-10 ms-5">
                        <input type="text" class="form-control" id="search" name="search"
                            placeholder="Enter a City, Property Type, Buy or Rent..." required>
                    </div>
                    <div class="col-2 d-flex justify-content-start ms-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-5">
        <a href="{{ route('buyPage') }}">
            <div class="card ms-2 me-2">
                <img src="{{ asset('storage/assets/buy.jpg') }}" class="card-img" alt="..."
                    style="height:200px; width:300px">
                <div class="card-body  text-center">
                    <h3>Buy Real Estate</h3>
                </div>
            </div>
        </a>
        <a href="{{ route('rentPage') }}">
            <div class="card ms-2 me-2">
                <img src="{{ asset('storage/assets/rent.jpg') }}" class="card-img" alt="..."
                    style="height:200px; width:300px">
                <div class="card-body  text-center">
                    <h3>Rent Real Estate</h3>
                </div>
            </div>
        </a>
        <a href="{{ route('aboutUsPage') }}">
            <div class="card ms-2 me-2">
                <img src="{{ asset('storage/assets/aboutUsHome.jpg') }}" class="card-img" alt="..."
                    style="height:200px; width:300px">
                <div class="card-body text-center">
                    <h3>About Us</h3>
                </div>
            </div>
        </a>
    </div>
@endsection
