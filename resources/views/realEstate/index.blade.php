@extends('layouts.admin.main')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <form action="{{ route('createRealEstatePage') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">+ Add Real Estate</button>
    </form>
    <div class="container">
        @if (count($realEstates) > 0)
            @foreach ($realEstates as $realEstate)
                <div class="col-md-3 col-sm-6">
                    <div class="card" style="width: 25rem;">
                        <img src="{{ asset('storage/realEstate/' . $realEstate->image) }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $realEstate->price }}</h4>
                            <h4 class="card-title">{{ $realEstate->buildingType }}</h4>
                            <h4 class="card-title">{{ $realEstate->salesType }}</h4>
                            <span class="badge bg-success">{{ $realEstate->status }}</span>
                            {{-- Update Button --}}
                            <form action="{{ route('editRealEstatePage', $realEstate->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            {{-- Delete Button --}}
                            <form action="{{ route('deleteRealEstate', $realEstate->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            {{-- Finish Button --}}
                            @if ($realEstate->status == 'Cart')
                                <form action="{{ route('finishRealEstate', $realEstate->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Finish</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $realEstates->links() }}
        @else
            No Real Estate
        @endif
    </div>
@endsection
