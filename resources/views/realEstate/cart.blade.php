@extends('layouts.user.main')

@section('content')
    @if (count($realEstates) > 0)
        @foreach ($realEstates as $realEstate)
            {{ $realEstate->price }} -
            {{ $realEstate->location }} -
            {{ $realEstate->buildingType }} -
            {{ $realEstate->updated_at }}

            {{-- Cancel Button --}}
            <form action="{{ route('removeFromCart', $realEstate->id) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Cancel</button>
            </form>

            <br>
        @endforeach
        {{ $realEstates->links() }}
        {{-- Checkout Button --}}
        <form action="{{ route('checkoutCart') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
    @else
        <h1>No data in cart yet</h1>
    @endif
@endsection
