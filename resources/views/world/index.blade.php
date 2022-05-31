@extends('template.main')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <h1 class="text-center mt-5">
                    world
                </h1>
                <form action="/world/searchnewsworld">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3">
                            @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if (request('user'))
                            <input type="hidden" name="user" value="{{ request('user') }}">
                            @endif
                            <select class="custom-select" name="user">
                                <option value="">Choose User</option>
                                @foreach ($users as $user)
                                @if (request('user') == $user->username)
                                <option value="{{ $user->username }}">{{ $user->name }}</option>
                                @endif
                                <option value="{{ $user->username }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">

                            <select class="custom-select" name="category">
                                <option value="">Choose category</option>
                                @foreach ($categories as $category)
                                @if (request('category') == $category->slug)
                                <option value="{{ $category->slug }}" selected>{{ $category->name }}</option>
                                @endif
                                <option value="{{ $category->slug }}">{{ $category->name }}</option>
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
            <h5 class="text-muted font-weight-medium mb-3">World News</h5>
        </div>
    </div>
    @if ($world->count())

    <div class="row">
        <div class="col-lg-6  mb-5 mb-sm-2">
            <div class="position-relative image-hover">

                @if ($world[0]->image)
                <img src="{{ asset('storage/'.$world[0]->image) }}" class="img-fluid w-100 " alt="world-news" />
                @else
                <img src="https://source.unsplash.com/1200x900?{{ $world[0]->category->name }}" class="img-fluid"
                    alt="world-news" />
                @endif

                <span class="thumb-title"> <a href="/world/searchnewsworld?category={{ $world[0]->category->slug }}"
                        class="text-light text-decoration-none"> {{ $world[0]->category->name }}</a></span>
            </div>
            <h1 class="font-weight-600 mt-3">
                <a href="/home/show/{{ $world[0]->slug }}" class='text-decoration-none hover '>{{
                    $world[0]->title }}</a>
            </h1>
            <small class="text-muted"><a href="/world/searchnewsworld?user={{ $world[0]->user->username }}"
                    class="text-decoration-none" style="font-size: 12px;">{{ $world[0]->user->name
                    }}</a> ({{ $world[0]->created_at->diffForHumans() }})</small>
            <p class="fs-15 font-weight-normal">
                {{ $world[0]->excerpt }}
            </p>
        </div>
        <div class="col-lg-6  mb-5 mb-sm-2">
            <div class="row">
                @foreach ($worldside->skip(1) as $ws)

                <div class="col-sm-6  mb-5 mb-sm-2">
                    <div class="position-relative image-hover">
                        @if ($ws->image)
                        <img src="{{ asset('storage/'.$ws->image) }}" class="img-fluid w-100 " style="height: 200px"
                            alt="world-news" />
                        @else
                        <img src="https://source.unsplash.com/1200x600?{{ $ws->category->name }}" class="img-fluid"
                            alt="world-news" />
                        @endif

                        <span class="thumb-title"> <a href="/world/searchnewsworld?category={{ $ws->category->slug }}"
                                class="text-light text-decoration-none"> {{ $ws->category->name }}</a></span>
                    </div>
                    <h5 class="font-weight-600 mt-3">
                        <a href="/home/show/{{ $ws->slug }}" class='text-decoration-none hover '>{{
                            $ws->title }}</a>
                    </h5>
                    <small class="text-muted" style="font-size: 12px;"><a
                            href="/world/searchnewsworld?user={{ $ws->user->username }}" class="text-decoration-none">{{
                            $ws->user->name
                            }}</a> ({{ $ws->created_at->diffForHumans() }})</small>
                    <p class="fs-15 font-weight-normal">
                        {{ $ws->excerpt }}
                    </p>
                </div>
                @endforeach

            </div>

        </div>
    </div>
    {{-- All world news --}}

    <div class="row mb-4 mt-5">
        @foreach ($world->skip(5) as $w)
        <div class=" col-12 col-sm-6  col-md-4 col-lg-3  mb-5 mb-sm-2">
            <div class="position-relative image-hover">
                @if ($w->image)
                <img src="{{ asset('storage/'. $w->image) }}" class="img-fluid w-100" style="height:250px;"
                    alt="world-news" />
                @else
                <img src="https://source.unsplash.com/500x500?{{ $w->category->name }}" class="img-fluid "
                    alt="world-news" />
                @endif
                <span class="thumb-title"> <a href="/world/searchnewsworld?category={{ $w->category->slug }}"
                        class="text-light text-decoration-none"> {{ $w->category->name }}</a></span>
            </div>
            <small class="text-muted" style="font-size: 12px;"><a
                    href="/world/searchnewsworld?user={{ $w->user->username }}" class="text-decoration-none">{{
                    $w->user->name
                    }}</a> ({{ $w->created_at->diffForHumans() }})</small>
            <h5 class="font-weight-600 mt-1">
                <a href="/home/show/{{ $w->slug }}" class='text-decoration-none hover '>{{
                    $w->title }}</a>
            </h5>


        </div>
        @endforeach

    </div>
    <div class="d-flex justify-content-center mb-5">
      
            {{ $world->links() }}
        
    </div>
    @else
    <div class="d-flex justify-content-center mt-4">
        <h1>News not found!</h1>
    </div>
    @endif



</div>
<!-- main-panel ends -->
<!-- container-scroller ends -->
@endsection