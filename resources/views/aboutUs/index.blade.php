@extends('layouts.main')

@section('content')
    <div class="card bg-dark text-white mb-3">
        <img src="{{ asset('storage/assets/bannerAbout.jpg') }}" class="card-img" alt="Office Image"
            style="height: 350px; object-fit: cover;">
        <div class="card-img-overlay text-center">
            <h3 class="card-title mt-5">About Our Company</h3>
            <p class="card-text text-wrap mt-5">Our company was founded at 2008 by our founder Renanda. At that time, we
                started as law firm specializing in real estate and construction. In 2012, our company expanded our service
                to real estates with the included service of real estates lawyers. Today, our company have 5 offices
                throughout the states and is planning to build more.</p>
        </div>
    </div>
    <div class="container">
        <h3 class="card-header text-start ms-2 me-2" style="background: none">
            Our Offices
        </h3>
        <div class="card border-0">
            @if (count($offices) > 0)
                <div class="card-body row justify-content-center">
                    @foreach ($offices as $office)
                        <div class="card ms-1 me-1 mb-1 shadow" style="width: 210px">
                            <img src="{{ asset('storage/uploads/office/' . $office->image) }}" class="card-img-top mt-2"
                                style="height: 250px; width:100%">
                            <div class="card-body border-0 ps-0">
                                <div style="height: 250px">
                                    <h5 class="card-title">{{ $office->name }}</h5>
                                    <p class="card-text">{{ $office->address }}</p>
                                    <p class="card-text">{{ $office->contactName }}</p>
                                    <p class="card-text">{{ $office->phone }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <h1>No Offices Available</h1>
            @endif
            <div class="d-flex justify-content-center mt-5">
                {{ $offices->links() }}
            </div>
        </div>
    </div>
@endsection
