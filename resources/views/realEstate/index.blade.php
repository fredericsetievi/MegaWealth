@extends('layouts.user.main')

@section('content')
    @foreach ($realEstates as $realEstate)
        {{ $realEstate->location }}
        {{ $realEstate->salesType }}
        <br>
    @endforeach
    {{ $realEstates->links() }}
@endsection
