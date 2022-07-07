@extends('layouts.main')

@section('css')
    <style>
        a {
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card bg-dark text-white mb-3">
        <img src="{{ asset('storage/assets/bannerHome.jpg') }}" class="card-img" alt="Office Image"
            style="height: 450px; object-fit: cover">
        <div class="card-img-overlay text-center">
            <h1 style="margin-top:130px">Find Your Future Home</h1>
            <form action="{{ route('searchResultPage') }}" method="GET" style="margin-top: 40px">
                <div class="search-group d-flex" style="justify-content: center">
                    <div class="col-8 ms-5">
                        <input type="text" class="form-control" id="search" name="search"
                            placeholder="Enter a City, Property Type, Buy or Rent..." required>
                    </div>
                    <div class="col-1 d-flex ms-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-5">
        @if (Gate::allows('isAdmin'))
            <a href="{{ route('manageRealEstatePage') }}" style="text-decoration: none">
                <div class="card ms-2 me-2">
                    <img src="{{ asset('storage/assets/buy.jpg') }}" class="card-img" alt="Real Estate Image"
                        style="height:200px; width:300px">
                    <div class="card-body text-center">
                        <h3>Manage Real Estate</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('manageOfficePage') }}">
                <div class="card ms-2 me-2">
                    <img src="{{ asset('storage/assets/aboutUsHome.jpg') }}" class="card-img" alt="Office Image"
                        style="height:200px; width:300px">
                    <div class="card-body  text-center">
                        <h3>Manage Company</h3>
                    </div>
                </div>
            </a>
        @else
            <a href="{{ route('buyPage') }}">
                <div class="card ms-2 me-2">
                    <img src="{{ asset('storage/assets/buy.jpg') }}" class="card-img" alt="Real Estate Image"
                        style="height:200px; width:300px">
                    <div class="card-body  text-center">
                        <h3>Buy Real Estate</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('rentPage') }}">
                <div class="card ms-2 me-2">
                    <img src="{{ asset('storage/assets/rent.jpg') }}" class="card-img" alt="Real Estate Image"
                        style="height:200px; width:300px">
                    <div class="card-body  text-center">
                        <h3>Rent Real Estate</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('aboutUsPage') }}">
                <div class="card ms-2 me-2">
                    <img src="{{ asset('storage/assets/aboutUsHome.jpg') }}" class="card-img" alt="Office Image"
                        style="height:200px; width:300px">
                    <div class="card-body text-center">
                        <h3>About Us</h3>
                    </div>
                </div>
            </a>
        @endif
    </div>
@endsection
