@extends('layouts.main')

@section('content')
    @if (count($realEstates) > 0)
        <div class="card border-0">
            <h1 class="card-header text-start ms-2 me-2 border-0" style="background: none">
                Showing Real Estates For: {{ $title }}
            </h1>
            <div class="card-body">
                <div class="card-group">
                    @foreach ($realEstates as $realEstate)
                        <div class="card ms-1 me-1 shadow">
                            <img src="{{ asset('storage/uploads/realEstate/' . $realEstate->image) }}" class="card-img-top"
                                style="height: 200px; width:300px">
                            <div class="card-body">
                                @if ($realEstate->salesTypeId == $saleId)
                                    <h4>{{ $realEstate->price }}</h4>
                                @elseif($realEstate->salesTypeId == $rentId)
                                    <h4>{{ $realEstate->price }} / Month</h4>
                                @endif
                                <h5>{{ $realEstate->location }}</h5>
                                <span class="badge bg-info">{{ $realEstate->buildingType->name }}</span>
                                {{-- Submit Button --}}
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
                    @endforeach
                </div>
            </div>
        </div>
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
        <div class="d-flex justify-content-center mt-5">
            {{ $realEstates->appends(Request::except('page'))->links() }}
        </div>
    @else
        <h1>No Real Estate Available</h1>
    @endif
@endsection
