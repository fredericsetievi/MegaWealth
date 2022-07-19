@extends('layouts.main')

@section('content')
    <h1 class="ms-5 mt-4">Your Cart</h1>
    @if (count($realEstates) > 0)
        <div class="card border-0">
            <div class="card-body row justify-content-center mt-3">
                @foreach ($realEstates as $realEstate)
                    <div class="card ms-1 me-1 mb-3 shadow" style="width: 250px">
                        <img src="{{ asset('storage/uploads/realEstate/' . $realEstate->image) }}" class="card-img-top mt-2" alt="Real Estate Image" style="height: 250px; width:100%">
                        <div class="card-body">
                            <div style="height: 200px">
                                @if ($realEstate->salesTypeId == $saleId)
                                    <h4>{{ $realEstate->price }}</h4>
                                @elseif($realEstate->salesTypeId == $rentId)
                                    <h4>{{ $realEstate->price }} / Month</h4>
                                @endif
                                <h5>{{ $realEstate->location }}</h5>
                                <span class="badge bg-info">{{ $realEstate->buildingType->name }}</span>
                                <span
                                    class="badge bg-warning">{{ date('Y-m-d', strtotime($realEstate->updated_at)) }}</span>
                            </div>
                            {{-- Cancel Button --}}
                            <div class="d-flex justify-content-center mt-3">
                                <form action="{{ route('removeFromCart', $realEstate->id) }}" method="POST"
                                    class="d-flex justify-content-center">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $realEstates->links() }}
        </div>
        {{-- Checkout Button --}}
        <div class="container d-flex justify-content-center mt-2 mb-4">
            <form action="{{ route('checkoutCart',$realEstates->first()->user()->first()->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        </div>
    @else
        <div class="d-flex justify-content-center mt-5">
            <h1>No data in cart yet</h1>
        </div>
    @endif
@endsection
