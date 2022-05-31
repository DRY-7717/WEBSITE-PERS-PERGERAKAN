@extends('template.main')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <h1 class="text-center mt-5 mb-3">
                    {{ $bigtitle }}
                </h1>
                <form action="/sport/searchnewssport">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3">
                            @if (request('user'))
                            <input type="hidden" name="user" value="{{ request('user') }}">
                            @endif
                            <select class="custom-select" name="user">
                                <option value="">Choose User</option>
                                @foreach ($users as $user)
                                @if (request('user') == $user->username)
                                <option value="{{ $user->username }}" selected>{{ $user->name }}</option>
                                @else
                                <option value="{{ $user->username }}">{{ $user->name }}</option>
                                @endif

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control rounded" placeholder="Search news"
                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                    value="{{ request('search') }}" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary rounded ml-1" type="submit"
                                        id="button-addon2">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <h5 class="text-muted font-weight-medium mb-3">Sport News</h5>
        </div>
    </div>
    @if ($sports->count())
    @foreach ($sports as $sport)
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                @if ($sport->image)
                <img src="{{ asset('storage/'. $sport->image) }}" class="img-fluid w-100" style="height:200px;"
                    alt="world-news" />
                @else
                <img src="https://source.unsplash.com/1200x600?{{ $sport->category->name }}" class="img-fluid "
                    alt="world-news" />
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">
                        <a href="/home/show/{{ $sport->slug }}" class='text-decoration-none hover '>{{
                            $sport->title }}</a>
                    </h3>
                    <small class="text-primary"><a
                            href="/technology/searchnewstechnology?user={{ $sport->user->username }}">{{
                            $sport->user->name }}</a> | <a
                            href="/technology/searchnewstechnology?category={{ $sport->category->slug }}">{{
                            $sport->category->name
                            }}</a></small>
                    <p class="card-text mt-3">{{ $sport->excerpt }}</p>
                    <p class="card-text"><small class="text-muted">Last updated {{ $sport->created_at->diffForHumans()
                            }}</small></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class=" d-flex flex-column">
        <img src="/img/notfound.svg" style="width: 600px; height: 600px; margin: 10px auto" alt="">
        <h1 style="margin: 5px auto;">News not found !</h1>
    </div>
    @endif
</div>
<!-- main-panel ends -->
<!-- container-scroller ends -->
@endsection