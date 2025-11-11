@extends('template.layout')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height:70vh;">
        <div class="w-100" style="max-width:420px;">
            <div class="card p-4 bg-white text-dark">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="text-danger small" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="text-danger small" />
                    </div>

                    <div class="mb-3 form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            @if (Route::has('password.request'))
                                <a class="small"
                                    href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                            @endif
                            <br>
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('register') }}">
                                {{ __('Dont have an account?') }}
                            </a>

                        </div>

                        <button type="submit" class="btn btn-warning">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
