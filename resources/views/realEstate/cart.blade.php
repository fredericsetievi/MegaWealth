@extends('layouts.main')

@section('content')
    @if (count($realEstates) > 0)
        <h1>Your Cart</h1>
        @foreach ($realEstates as $realEstate)
            <div class="col-md-3 col-sm-6">
                <div class="card" style="width: 25rem;">
                    <img src="{{ asset('storage/uploads/realEstate/' . $realEstate->image) }}" class="card-img-top"
                        alt="Real Estate Image">
                    <div class="card-body">
                        <h4>{{ $realEstate->price }}</h4>
                        <h5>{{ $realEstate->location }}</h5>
                        <span class="badge bg-info">{{ $realEstate->buildingType }}</span>
                        <span class="badge bg-warning">{{ date('Y-m-d', strtotime($realEstate->updated_at)) }}</span>
                        {{-- Cancel Button --}}
                        <form action="{{ route('removeFromCart', $realEstate->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $realEstates->links() }}
        {{-- Checkout Button --}}
        <form action="{{ route('checkoutCart') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
    @else
        <h1>No data in cart yet</h1>
    @endif
@endsection
