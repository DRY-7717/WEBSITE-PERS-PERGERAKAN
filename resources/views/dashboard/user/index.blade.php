@extends('layout.main')


@section('section')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>My profile</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('message'))
                    {!! session('message') !!}
                    @endif
                </div>
            </div>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card profile-widget ">
                        <div class="profile-widget-header">
                            @if (auth()->user()->image)
                            <img alt="image" src="{{ asset('storage/'.auth()->user()->image) }}"
                                class="rounded-circle profile-widget-picture">
                            @else
                            <img alt="image" src="/assetsdashboard/img/avatar/avatar-1.png"
                                class="rounded-circle profile-widget-picture">
                            @endif

                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label"><i class="fas fa-newspaper"></i> Posts</div>
                                    <div class="profile-widget-item-value">{{ $posts->count() }}</div>
                                </div>
                            </div>
                        </div>
                        <form action="/dashboard/user/{{ auth()->user()->id }}" method="post" class="needs-validation"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            value="{{ auth()->user()->name }}" name="name">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->email }}"
                                            disabled name="email">
                                        <div class="invalid-feedback">
                                            Please fill in the last name
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                        <label>Username</label>
                                        <input type="email" class="form-control" value="{{ auth()->user()->username }}"
                                            disabled name="username">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Tanggal lahir</label>
                                        <input type="date" class="form-control @error('ttl') is-invalid @enderror"
                                            value="{{ auth()->user()->ttl }}" name="ttl">
                                        @error('ttl')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Komisariat</label>
                                        <input type="tel" class="form-control @error('komisariat') is-invalid @enderror"
                                            value="{{ auth()->user()->komisariat }}" name="komisariat">
                                        @error('komisariat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                        <div class="col-sm-12 col-md-7">
                                            @if (auth()->user()->image)
                                            <img src="{{ asset('storage/'.auth()->user()->image) }}"
                                                class="img-preview  img-fluid mb-2">
                                            @else
                                            <img class="img-preview  img-fluid mb-2 d-none">
                                            @endif
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('image') is-invalid @enderror"
                                                    id="customFile" name="image" onchange="previewImage()">
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-12">

                                        <label>Alamat </label>
                                        @error('alamat')
                                        <small class="text-danger italic">( {{ $message }} )</small>
                                        @enderror
                                        <textarea class="form-control summernote-simple"
                                            name="alamat">{{ auth()->user()->alamat }}</textarea>

                                    </div>

                                </div>


                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
    </section>
</div>
@endsection