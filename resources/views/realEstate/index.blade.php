@extends('layouts.user.main')

@section('content')
    <h1>Showing Real Estates For {{ $title }}</h1>
    @foreach ($realEstates as $realEstate)
        {{ $realEstate->id }}
        {{ $realEstate->location }}
        {{ $realEstate->salesType }}
        <br>
    @endforeach
    {{ $realEstates->links() }}
@endsection
