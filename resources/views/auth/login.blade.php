@extends('layouts.master')

@section('content')
    <!-- Start Page Title -->
    <!-- End Page Title -->

    <section class="login-area ptb-100">
        <div class="login-content">
            <h2>{{ __('messages.login') }}</h2>

            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <div class="form-group">
                    <input id="email" name="email" type="email" class="form-control" placeholder="{{ __('messages.email_address') }}" :value="old('email')" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-group position-relative">
                    <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('messages.password') }}" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <a class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointerrr" onclick="togglePasswordVisibility()">
                        <i id="togglePasswordIcon" class="bx bx-show"></i>
                    </a>
                </div>

                <button type="submit" class="default-btn">{{ __('messages.login') }}</button>
                <a href="{{ route('password.request') }}" class="forgot-password">{{ __('messages.lost_password') }}</a>
            </form>
        </div>
    </section>
@endsection
