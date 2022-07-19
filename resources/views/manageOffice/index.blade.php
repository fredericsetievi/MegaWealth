@extends('layouts.main')

@section('content')
    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <form action="{{ route('createOfficePage') }}" method="GET">
            <button type="submit" class="btn btn-primary ms-3 mt-4 shadow mb-1">+ Add Office</button>
        </form>
    </div>
    <div class="container">
        @if (count($offices) > 0)
            <div class="card border-0">
                <div class="card-body row justify-content-center">
                    @foreach ($offices as $office)
                        <div class="card ms-1 me-1 mb-1 shadow" style="width: 250px">
                            <img src="{{ asset('storage/uploads/office/' . $office->image) }}" class="card-img-top mt-2"
                                alt="Office Image" style="height:250px; width:100%">
                            <div class="card-body">
                                <div style="height: 200px">
                                    <h4>{{ $office->name }}</h4>
                                    <h6>{{ $office->address }}</h6>
                                    <h6>{{ $office->contactName }} - {{ $office->phone }}</h6>
                                </div>
                                <div class="d-flex justify-content-center">
                                    {{-- Update Button --}}
                                    <form action="{{ route('editOfficePage', $office->id) }}" method="GET"
                                        class="ms-1">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    {{-- Delete Button --}}
                                    <form action="{{ route('deleteOffice', $office->id) }}" method="POST" class="ms-3">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $offices->links() }}
            </div>
        @else
            <div class="d-flex justify-content-center mt-5">
                <h1>No Office Available</h1>
            </div>
        @endif
    </div>
@endsection
