@extends('template.main')


@section('section')
<div class="container">
    <div class="row justify-content-center mt-5 mb-4">
        <div class="col-6 d-flex justify-content-center">
            <h2 class="text-center title">Forgot Password</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            @if (session('message'))
            {!! session('message') !!}
            @endif

            <form action="/auth/forgotpassword" method="post">
                @csrf
                <div class="form-group">
                    <p class="mb-3 text-muted" style="font-size: 15px">Please input your email and we will send message in your email to reset your password</p>
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}">

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
              
                <button type="submit" class="btn btn-primary w-100">Send reset password link</button>
                <hr>
                <a href="/auth/register" class="text-center d-block mb-1 text-decoration-none"><small>Have an
                        account?</small></a>
                <a href="/signin" class="text-center d-block text-decoration-none"><small>Sign In</small></a>
            </form>
        </div>
    </div>
</div>
@endsection