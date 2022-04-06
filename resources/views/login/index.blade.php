@extends('layouts.user.main')

@section('content')
    <div class="card" style="width: 50rem;">
        <div class="card-body">
            <form action="{{ route('authenticateLogin') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                        placeholder="Enter your email address here.">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Your password must be at least 8 characters.">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox">
                    <label class="form-check-label" for="checkbox">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
