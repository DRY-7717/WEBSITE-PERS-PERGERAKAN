@extends('template.main')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <h1 class="text-center mt-5 mb-3">
                    {{ $bigtitle }}
                </h1>
                <form action="/automotive/searchnewsautomotive">
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
            <h5 class="text-muted font-weight-medium mb-3">Automotive News</h5>
        </div>
    </div>
    @if ($auto->count())
    @foreach ($auto as $at)
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                @if ($at->image)
                <img src="{{ asset('storage/'. $at->image) }}" class="img-fluid w-100" style="height:200px;"
                    alt="world-news" />
                @else
                <img src="https://source.unsplash.com/1200x600?{{ $at->category->name }}" class="img-fluid "
                    alt="world-news" />
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">
                        <a href="/home/show/{{ $at->slug }}" class='text-decoration-none hover '>{{
                            $at->title }}</a>
                    </h3>
                    <small class="text-primary"><a href="/automotive/searchnewsautomotive?user={{ $at->user->username }}">{{
                            $at->user->name }}</a> | <a
                            href="/automotive/searchnewsautomotive?category={{ $at->category->slug }}">{{ $at->category->name
                            }}</a></small>
                    <p class="card-text mt-3">{{ $at->excerpt }}</p>
                    <p class="card-text"><small class="text-muted">Last updated {{ $at->created_at->diffForHumans()
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