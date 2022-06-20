@extends('layouts.user.main')

@section('content')
    <div class="card bg-dark text-white">
        <img src="https://www.wallpaperuse.com/wallp/84-845329_m.jpg" class="card-img" alt="..." style="height: 300px">
        <div class="card-img-overlay text-center">
            <h3 class="card-title mt-5">About Our Company</h3>
            <p class="card-text text-wrap mt-5">Our company was founded at 2008 by our founder Renanda. At that time, we started as law firm specializing in real estate and construction. In 2012, our company expanded our service to real estates with the included service of real estates lawyers. Today, our company have 5 offices throughout the states and is planning to build more.</p>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header text-start" style="background: none">
            Our Offices
        </h5>

        <div class="card-body">
            <div class="card-group">

                @foreach ($offices as $office)
                    <div class="card ms-1 me-1 border-0">
                        <img src="..." class="card-img-top" style="height: 200px">
                        <div class="card-body border-0">
                            <h5 class="card-title">{{ $office->name }}</h5>
                            <p class="card-text">{{ $office->address }}</p>
                            <p class="card-text">{{ $office->contactName }}</p>
                            <p class="card-text">{{ $office->phone }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $offices->links() }}
        </div>
    </div>
    @foreach ($offices as $office)
        {{ $office->name }}
        <br>
    @endforeach
    {{ $offices->links() }}
@endsection
