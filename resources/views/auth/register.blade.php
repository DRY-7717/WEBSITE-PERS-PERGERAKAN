@extends('template.main')


@section('section')
<div class="container">
    <div class="row justify-content-center mt-5 mb-4">
        <div class="col-6 d-flex justify-content-center">
            <h2 class="text-center   title">Sign Up</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form class="/auth/register" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" value="{{ old('username') }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
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
                    <label for="alamat">Alamat </label>
                    <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ old('alamat') }}">
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ttl">Tanggal lahir</label>
                        <input type="date" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl"
                            value="{{ old('ttl') }}">
                        @error('ttl')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="komisariat">Komisariat</label>
                        <input type="text" class="form-control @error('komisariat') is-invalid @enderror"
                            id="komisariat" name="komisariat" value="{{ old('komisariat') }}">
                        @error('komisariat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="confirm_password">Confirm password</label>
                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                            id="confirm_password" name="confirm_password">
                        @error('confirm_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                <hr>
                <a href="/auth/signin" class="text-center d-block mb-1 text-decoration-none" ><small>Sign in</small></a>
                
            </form>
        </div>
    </div>
</div>
@endsection