@extends('layouts.user.main')

@section('content')
    @foreach ($offices as $office)
        {{ $office->name }}
        <br>
    @endforeach
    {{ $offices->links() }}
@endsection
