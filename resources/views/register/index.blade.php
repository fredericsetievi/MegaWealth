@extends('layouts.user.main')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card border border-primary" style="width: 50rem;">
            <div class="card-body">
                <form action="{{ route('authenticateLogin') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Name</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Your Name Here..." required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Your Email Address Here..." required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Your password must be at least 8 characters." required minlength="8">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Re-type your password" required minlength="8">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
            </div>
        </div>
    </div>
@endsection
