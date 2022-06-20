@extends('layouts.user.main')

@section('content')
    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-center mt-5">
        <div class="top-banner">
            <h1>Find Your Future Home</h1>
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="search-group d-flex">
                    <div class="col-10 me-2">
                        <input type="text" class="form-control" id="search" name="search"
                            placeholder="Enter a City, Property Type, Buy or Rent..." required>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="navigate-content">
            <a href="{{ route('buyPage') }}">Buy Real Estate</a>
            <a href="{{ route('rentPage') }}">Rent Real Estate</a>
            <a href="{{ route('aboutUsPage') }}">About Us</a>
        </div>
    </div>
@endsection
