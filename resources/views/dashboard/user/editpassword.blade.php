@extends('layout.main')


@section('section')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Change Password</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @if (session('message'))
                    {!! session('message') !!}
                    @endif
                    <div class="card  shadow">
                        <div class="card-header">
                            <h4>Please, to create a strong password</h4>
                        </div>
                        <div class="card-body">
                            <form action="/dashboard/user/changepassword/{{ auth()->user()->username }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Current
                                        Password</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password"
                                            class="form-control @error('cpassword') is-invalid @enderror"
                                            name="cpassword" id="cpassword">

                                        @error('cpassword')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">New
                                        Password</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            id="password">

                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Repeat
                                        Password</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password"
                                            class="form-control @error('password2') is-invalid @enderror"
                                            name="password2" id="password2">

                                        @error('password2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>


@endsection