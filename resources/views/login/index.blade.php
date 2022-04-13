@extends('layouts.user.main')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card border border-primary" style="width: 50rem;">
            <div class="card-body">
                <form action="{{ route('authenticateLogin') }}" method="POST">
                    @csrf
                    <div class="text-center">
                        <h1>Login</h1>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                            placeholder="Enter Your Email Address Here..." required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Your password must be at least 8 characters." required minlength="8">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox">Remember Me</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
