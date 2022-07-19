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
        <form action="{{ route('createRealEstatePage') }}" method="GET">
            <button type="submit" class="btn btn-primary ms-3 mt-4 shadow mb-1">+ Add Real Estate</button>
        </form>
    </div>
    <div class="container">
        @if (isset($title))
            <h1 class="card-header text-start ms-2 me-2 border-0" style="background: none">
                Showing Real Estates For: {{ $title }}
            </h1>
        @endif
        @if (count($realEstates) > 0)
            <div class="card border-0">
                <div class="card-body row justify-content-center">
                    @foreach ($realEstates as $realEstate)
                        <div class="card ms-1 me-1 mb-1 shadow" style="width: 250px">
                            <img src="{{ asset('storage/uploads/realEstate/' . $realEstate->image) }}"
                                class="card-img-top mt-2" alt="Real Estate Image" style="height:250px; width:100%">
                            <div class="card-body">
                                <div style="height:200px">
                                    <h4>{{ $realEstate->price }}</h4>
                                    <h4>{{ $realEstate->buildingType->name }}</h4>
                                    <h4>{{ $realEstate->salesType->name }}</h4>
                                    <span class="badge bg-success ms-1 mb-2">{{ $realEstate->status->name }}</span>
                                </div>
                                <div class="d-flex justify-content-center">
                                    {{-- Update Button --}}
                                    <form action="{{ route('editRealEstatePage', $realEstate->id) }}" method="GET">
                                        <button type="submit" class="btn btn-primary ms-1 me-1">Update</button>
                                    </form>
                                    {{-- Delete Button --}}
                                    @if ($realEstate->statusId != $completedId)
                                        <form action="{{ route('deleteRealEstate', $realEstate->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ms-1 me-1">Delete</button>
                                        </form>
                                    @endif
                                    {{-- Finish Button --}}
                                    @if ($realEstate->statusId == $cartId)
                                        <form action="{{ route('finishRealEstate', $realEstate->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-success ms-1 me-1">Finish</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <div>
                    {{ $realEstates->appends(Request::except('page'))->links() }}
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center mt-5">
                <h1>No Real Estate Available</h1>
            </div>
        @endif
    </div>
@endsection
