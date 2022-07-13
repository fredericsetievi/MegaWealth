@extends('layouts.main')

@section('content')
    @if (count($realEstates) > 0)
        <div class="card border-0">
            <h1 class="card-header text-start ms-2 me-2 border-0" style="background: none">
                Showing Real Estates For: {{ $title }}
            </h1>
            <div class="card-body row justify-content-center mt-3">
                @foreach ($realEstates as $realEstate)
                    <div class="card ms-1 me-1 shadow" style="width: 300px">
                        <img src="{{ asset('storage/uploads/realEstate/' . $realEstate->image) }}" class="card-img-top mt-2"
                            style="height: 250px; width:100%">
                        <div class="card-body">
                            <div style="height: 150px">
                                @if ($realEstate->salesTypeId == $saleId)
                                    <h4>{{ $realEstate->price }}</h4>
                                @elseif($realEstate->salesTypeId == $rentId)
                                    <h4>{{ $realEstate->price }} / Month</h4>
                                @endif
                                <h5>{{ $realEstate->location }}</h5>
                                <span class="badge bg-info">{{ $realEstate->buildingType->name }}</span>
                            </div>
                            {{-- Submit Button --}}
                            <div class="d-flex justify-content-center">
                                <form action="{{ route('storeToCart', $realEstate->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="realEstateId" value="{{ $realEstate->id }}">
                                    @if ($realEstate->salesTypeId == $saleId)
                                        <button type="submit" class="btn btn-primary">Buy</button>
                                    @elseif($realEstate->salesTypeId == $rentId)
                                        <button type="submit" class="btn btn-primary">Rent</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Error Message --}}
        @if (session('error'))
            <div class="alert alert-danger  mb-0">
                {{ session('error') }}
            </div>
        @elseif (session('success'))
            <div class="alert alert-success  mb-0">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-center mt-5">
            {{ $realEstates->appends(Request::except('page'))->links() }}
        </div>
    @else
        <div class="d-flex justify-content-center mt-5">
            <h1>No Real Estate Available</h1>
        </div>
    @endif
@endsection
