@extends('layouts.app_admin')
@section('page_title', 'Login')
@section('content')
<form class="mt-4 pt-2" action="{{ route('admin.login.submit') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">{{ __('E-Mail Address') }}</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <div class="d-flex align-items-start">
            <div class="flex-grow-1">
                <label class="form-label">{{ __('Password') }}</label>
            </div>
            @if (Route::has('password.request'))
            <div class="flex-shrink-0">
                <div class="">
                    <a href="{{ route('password.request') }}" class="text-muted">{{ __('Forgot Your Password?') }}</a>
                </div>
            </div>
            @endif
        </div>
        <div class="input-group auth-pass-inputgroup">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" aria-label="Password" aria-describedby="password-addon" />
            <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="row mb-4">
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
                <label class="form-check-label" for="remember-check">
                    {{ __('Remember Me') }}
                </label>
            </div>  
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
    </div>
</form>
@endsection
