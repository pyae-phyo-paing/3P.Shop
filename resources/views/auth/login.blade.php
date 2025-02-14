@extends('layouts.front')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-custom">
    <div class="glass-card p-4">
        <h3 class="text-center text-light fw-bold">Welcome!</h3>
        <p class="text-center text-muted">Step into 3P.Shop Fashions</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label text-light">Email</label>
                <input type="email" id="email" name="email" class="form-control custom-input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-light">Password</label>
                <input type="password" id="password" name="password" class="form-control custom-input @error('password') is-invalid @enderror" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 form-check d-flex align-items-center">
                <input type="checkbox" id="remember" name="remember" class="form-check-input custom-checkbox" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="form-check-label text-light ms-2">Remember Me</label>
            </div>
            <button type="submit" class="btn custom-btn w-100">Login</button>
        </form>
        @if (Route::has('password.request'))
            <p class="text-center mt-3">
                <a href="{{ route('password.request') }}" class="text-decoration-none text-light">Forgot Password?</a>
            </p>
        @endif
        
        <p class="text-center mt-3">
            <a href="/register" class="register-link">Create Account!</a>
        </p>
    </div>
    </div>
</div>
@endsection
