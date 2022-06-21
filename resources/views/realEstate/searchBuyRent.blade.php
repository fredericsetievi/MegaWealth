@extends('layouts.main')

@section('content')
    @if (count($realEstates) > 0)
        <h1>Showing Real Estates For {{ $title }}</h1>
        @foreach ($realEstates as $realEstate)
            <div class="col-md-3 col-sm-6">
                <div class="card" style="width: 25rem;">
                    <img src="{{ asset('storage/uploads/realEstate/' . $realEstate->image) }}" class="card-img-top"
                        alt="Real Estate Image">
                    <div class="card-body">
                        <h4>{{ $realEstate->price }}</h4>
                        <h5>{{ $realEstate->location }}</h5>
                        <span class="badge bg-info">{{ $realEstate->buildingType }}</span>
                        {{-- Submit Button --}}
                        <form action="{{ route('addToCart', $realEstate->id) }}" method="POST">
                            @csrf
                            @if ($realEstate->salesType == 'Sale')
                                <button type="submit" class="btn btn-primary">Buy</button>
                            @elseif($realEstate->salesType == 'Rent')
                                <button type="submit" class="btn btn-primary">Rent</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- Error Message --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {{ $realEstates->links() }}
    @else
        <h1>No Real Estate Available</h1>
    @endif
@endsection
