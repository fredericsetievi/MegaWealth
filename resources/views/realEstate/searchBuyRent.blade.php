@extends('layouts.user.main')

@section('content')
    <h1>Showing Real Estates For {{ $title }}</h1>
    @foreach ($realEstates as $realEstate)
        <form action="{{ route('addToCart', $realEstate->id) }}" method="POST">
            @csrf
            {{ $realEstate->price }}
            {{ $realEstate->location }}
            {{ $realEstate->buildingType }}
            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary">{{ $title }}</button>
        </form>
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
@endsection
