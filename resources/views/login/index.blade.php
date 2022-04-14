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
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Your Email Address Here..." required>
                            <span class="input-group-text text-danger" id="basic-addon2"><i class="bi bi-lock"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Your password must be at least 8 characters." required minlength="8">
                            <span class="input-group-text text-danger" id="basic-addon2"><i
                                    class="bi bi-lock"></i></span>
                        </div>
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
