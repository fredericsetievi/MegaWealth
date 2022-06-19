@extends('layouts.user.main')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    @if (count($realEstates) > 0)
        @foreach ($realEstates as $realEstate)
            {{ $realEstate->location }}
            {{ $realEstate->salesType }} [{{ $realEstate->id }}]
            {{-- --- {{ $realEstate->users->id }} --}}
            <br>
        @endforeach
        <br>
        <br>
        @foreach ($cart as $item)
            {{ $item->userId }} + {{ $item->realEstateId }}
            <br>
        @endforeach
        {{-- @for ($i = 0; $i < 5; $i++)
            {{ $realEstates[$i]->location }}
            {{ $realEstates[$i]->salesType }}
        @endfor --}}
    @else
        <h1>No data in cart yet</h1>
    @endif
@endsection
