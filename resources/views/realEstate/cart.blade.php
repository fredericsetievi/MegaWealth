@extends('layouts.main')

@section('content')
    <h1 class="ms-5 mt-4">Your Cart</h1>
    @if (count($realEstates) > 0)
        <div class="card border-0">
            <div class="card-body">
                <div class="card-group">
                    @foreach ($realEstates as $realEstate)
                        <div class="card ms-1 me-1 mb-3 shadow">
                            <img src="{{ asset('storage/uploads/realEstate/' . $realEstate->image) }}" class="card-img-top"
                                alt="Real Estate Image" style="height: 300px">
                            <div class="card-body">
                                @if ($realEstate->salesTypeId == $saleId)
                                    <h4>{{ $realEstate->price }}</h4>
                                @elseif($realEstate->salesTypeId == $rentId)
                                    <h4>{{ $realEstate->price }} / Month</h4>
                                @endif
                                <h5>{{ $realEstate->location }}</h5>
                                <span class="badge bg-info">{{ $realEstate->buildingType->name }}</span>
                                <span
                                    class="badge bg-warning">{{ date('Y-m-d', strtotime($realEstate->updated_at)) }}</span>
                                {{-- Cancel Button --}}
                                <form action="{{ route('removeFromCart', $realEstate->id) }}" method="POST"
                                    class="d-flex justify-content-center">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    {{ $realEstates->links() }}
                </div>
            </div>
        </div>
        {{-- Checkout Button --}}
        <div class="container d-flex justify-content-center mt-2">
            <form action="{{ route('checkoutCart',$realEstates->first()->user()->first()->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        </div>
    @else
        <div class="container text-center">No data in cart yet</div>
    @endif
@endsection
