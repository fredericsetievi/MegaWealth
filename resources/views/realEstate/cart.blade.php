@extends('layouts.user.main')

@section('content')
    @if (count($realEstates) > 0)
        @foreach ($realEstates as $realEstate)
            {{ $realEstate->location }}
            {{ $realEstate->salesType }}
            <br>
        @endforeach
        {{ $realEstates->links() }}
    @else
        <h1>No data in cart yet</h1>
    @endif
@endsection
