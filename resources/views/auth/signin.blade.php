@extends('template.main')


@section('section')
<div class="container">
    <div class="row justify-content-center mt-5 mb-4">
        <div class="col-6 d-flex justify-content-center">
            <h2 class="text-center   title">Sign In</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            @if (session('message'))
                {!! session('message') !!}
            @endif

            <form action="/auth/signin" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}">

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
                <hr>
                <a href="/auth/register" class="text-center d-block mb-1 text-decoration-none" ><small>Have an account?</small></a>
                
            </form>
        </div>
    </div>
</div>
@endsection