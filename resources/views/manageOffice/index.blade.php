@extends('layouts.main')

@section('content')
    <div class="container">
        <form action="{{ route('createOfficePage') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary ms-3 mt-4 shadow mb-1">+ Add Office</button>
        </form>
    </div>
    <div class="container">
        @if (count($offices) > 0)
        <div class="card border-0">
            <div class="card-body">
                <div class="card-group">
                    @foreach ($offices as $office)
                    <div class="card ms-1 me-1 mb-1 shadow">
                        <img src="{{ asset('storage/uploads/office/' . $office->image) }}" class="card-img-top"
                            alt="Office Image" style="height:250px">
                        <div class="card-body">
                            <h4>{{ $office->name }}</h4>
                            <h6>{{ $office->address }}</h6>
                            <h6>{{ $office->contactName }}  -  {{ $office->phone }}</h6>
                            <div class="d-flex">
                                {{-- Update Button --}}
                                <form action="{{ route('editOfficePage', $office->id) }}" method="GET" class="ms-1">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                                {{-- Delete Button --}}
                                <form action="{{ route('deleteOffice', $office->id) }}" method="POST" class="ms-3">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $offices->links() }}
        </div>
    @else
        <h1>No Office</h1>
    @endif
    </div>
@endsection