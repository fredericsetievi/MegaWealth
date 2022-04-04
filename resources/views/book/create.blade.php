@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Create Book</h1>
    </div>

    <form action="{{ route('storeBook') }}" method="POST">
        @csrf
        {{-- Book Name --}}
        <div class="mb-3">
            <label for="bookName" class="form-label">Book Name</label>
            <input type="text" class="form-control" id="bookName" aria-describedby="bookName">
        </div>
        {{-- Author --}}
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author">
        </div>
        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
