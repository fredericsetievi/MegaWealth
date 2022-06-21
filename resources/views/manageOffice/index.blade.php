@extends('layouts.main')

@section('content')
    <form action="{{ route('createOfficePage') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">+ Add Office</button>
    </form>
    <div class="container">
        @if (count($offices) > 0)
            @foreach ($offices as $office)
                <div class="col-md-3 col-sm-6">
                    <div class="card" style="width: 25rem;">
                        <img src="{{ asset('storage/uploads/office/' . $office->image) }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h4>{{ $office->name }}</h4>
                            <h4>{{ $office->location }}</h4>
                            <h4>{{ $office->contactName }}</h4>
                            <h4>{{ $office->phone }}</h4>
                            {{-- Update Button --}}
                            <form action="{{ route('editOfficePage', $office->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            {{-- Delete Button --}}
                            <form action="{{ route('deleteOffice', $office->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $offices->links() }}
        @else
            No Office
        @endif
    </div>
@endsection
