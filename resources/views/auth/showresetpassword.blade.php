@extends('template.main')


@section('section')
<div class="container">
    <div class="row justify-content-center mt-5 mb-4">
        <div class="col-6 d-flex justify-content-center">
            <h2 class="text-center   title">Reset Password</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            @if (session('message'))
            {!! session('message') !!}
            @endif

            <form action="/auth/resetpassword" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" value="{{ $token }}" name="token">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email', $email) }}">

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                   

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control @error('cpassword') is-invalid @enderror" id="cpassword"
                        name="cpassword">
                    @error('cpassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Reset password</button>
                <hr>
                <a href="/auth/register" class="text-center d-block mb-1 text-decoration-none"><small>Have an
                        account?</small></a>
                <a href="/auth/signin" class="text-center d-block text-decoration-none"><small>Sign in</small></a>
            </form>
        </div>
    </div>
</div>
@endsection