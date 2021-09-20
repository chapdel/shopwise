@extends('layouts.app')
@section('content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y" style="min-height: 84vh">
    <!-- ============================ COMPONENT LOGIN   ================================= -->
    <div class="card mx-auto" style="max-width: 380px; margin-top: 100px">
        <div class="card-body">
            <h4 class="card-title mb-4">Sign in</h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf {{--
                <a href="#" class="btn btn-facebook btn-block mb-2">
                    <i class="fab fa-facebook-f"></i> &nbsp Sign in with
                    Facebook</a
                >
                <a href="#" class="btn btn-google btn-block mb-4">
                    <i class="fab fa-google"></i> &nbsp Sign in with Google</a
                >
                --}}
                <div class="form-group row">
                    <label for="email" class="col-md-12 col-form-label">{{
                        __("E-Mail Address")
                    }}</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="
                                form-control
                                @error('email')
                                is-invalid
                                @enderror
                            " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-12 col-form-label">{{
                        __("Password")
                    }}</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="
                                form-control
                                @error('password')
                                is-invalid
                                @enderror
                            " name="password" required autocomplete="current-password" />

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    @if(Route::has('password.request'))
                    <a class="float-right" href="{{ route('password.request') }}">
                        {{ __("Forgot Your Password?") }}
                    </a>
                    @endif
                    <label class="float-left custom-control custom-checkbox" for="remember">
                        <input type="checkbox" class="custom-control-input" name="remember" id="remember"
                            {{ old("remember") ? "checked" : "" }}>
                        <div class="custom-control-label">
                            {{ __("Remember Me") }}
                        </div>
                    </label>
                </div>
                <!-- form-group form-check .// -->

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        Login
                    </button>
                </div>
                <!-- form-group// -->
            </form>
        </div>
        <!-- card-body.// -->
    </div>
    <!-- card .// -->

    @if(Route::has('register'))
    <p class="text-center mt-4">
        Don't have account? <a href="{{ route('register') }}">Sign up</a>
    </p>
    <br /><br />

    @endif @endsection
</section>
