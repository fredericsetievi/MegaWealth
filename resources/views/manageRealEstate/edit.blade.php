@extends('layouts.admin.main')

@section('content')
    <div class="card" style="width: 50rem;">
        <div class="card-body">
            <form action="{{ route('editRealEstatePage', $realEstate->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                        placeholder="Enter your name here.">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail" name="email"
                        aria-describedby="emailHelp" placeholder="Enter your email address here.">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Your password must be at least 8 characters.">
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                        placeholder="Re-type your password.">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
@endsection
