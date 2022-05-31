@extends('template.main')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <h1 class="text-center mt-5">
                    Sport
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
                                <option value="{{ $user->username }}">{{ $user->name }}</option>
                                @endif
                                <option value="{{ $user->username }}">{{ $user->name }}</option>
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
    @if ($sport->count())

    <div class="row">
        <div class="col-lg-6  mb-5 mb-sm-2">
            <div class="position-relative image-hover">

                @if ($sport[0]->image)
                <img src="{{ asset('storage/'.$sport[0]->image) }}" class="img-fluid w-100 " alt="world-news" />
                @else
                <img src="https://source.unsplash.com/1200x900?{{ $sport[0]->category->name }}" class="img-fluid"
                    alt="world-news" />
                @endif

                <span class="thumb-title"> <a
                        href="/sport/searchnewssport?category={{ $sport[0]->category->slug }}"
                        class="text-light text-decoration-none"> {{ $sport[0]->category->name }}</a></span>
            </div>
            <h1 class="font-weight-600 mt-3">
                <a href="/home/show/{{ $sport[0]->slug }}" class='text-decoration-none hover '>{{
                    $sport[0]->title }}</a>
            </h1>
            <small class="text-muted"><a href="/sport/searchnewssport?user={{ $sport[0]->user->username }}"
                    class="text-decoration-none" style="font-size: 12px;">{{ $sport[0]->user->name
                    }}</a> ({{ $sport[0]->created_at->diffForHumans() }})</small>
            <p class="fs-15 font-weight-normal">
                {{ $sport[0]->excerpt }}
            </p>
        </div>
        <div class="col-lg-6  mb-5 mb-sm-2">
            <div class="row">
                @foreach ($sportside->skip(1) as $ss)

                <div class="col-sm-6  mb-5 mb-sm-2">
                    <div class="position-relative image-hover">
                        @if ($ss->image)
                        <img src="{{ asset('storage/'.$ss->image) }}" class="img-fluid w-100 " style="height: 200px"
                            alt="world-news" />
                        @else
                        <img src="https://source.unsplash.com/1200x600?{{ $ss->category->name }}" class="img-fluid"
                            alt="world-news" />
                        @endif

                        <span class="thumb-title"> <a
                                href="/sport/searchnewssport?category={{ $ss->category->slug }}"
                                class="text-light text-decoration-none"> {{ $ss->category->name }}</a></span>
                    </div>
                    <h5 class="font-weight-600 mt-3">
                        <a href="/home/show/{{ $ss->slug }}" class='text-decoration-none hover '>{{
                            $ss->title }}</a>
                    </h5>
                    <small class="text-muted" style="font-size: 12px;"><a
                            href="/sport/searchnewssport?user={{ $ss->user->username }}"
                            class="text-decoration-none">{{
                            $ss->user->name
                            }}</a> ({{ $ss->created_at->diffForHumans() }})</small>
                    <p class="fs-15 font-weight-normal">
                        {{ $ss->excerpt }}
                    </p>
                </div>
                @endforeach

            </div>

        </div>
    </div>
    {{-- All world news --}}

    <div class="row mb-4 mt-5">
        @foreach ($sport->skip(5) as $s)
        <div class=" col-12 col-sm-6  col-md-4 col-lg-3  mb-5 mb-sm-2">
            <div class="position-relative image-hover">
                @if ($s->image)
                <img src="{{ asset('storage/'. $s->image) }}" class="img-fluid w-100" style="height:250px;"
                    alt="world-news" />
                @else
                <img src="https://source.unsplash.com/500x500?{{ $s->category->name }}" class="img-fluid "
                    alt="world-news" />
                @endif
                <span class="thumb-title"> <a href="/sport/searchnewssport?category={{ $s->category->slug }}"
                        class="text-light text-decoration-none"> {{ $s->category->name }}</a></span>
            </div>
            <small class="text-muted" style="font-size: 12px;"><a
                    href="/sport/searchnewssport?user={{ $s->user->username }}"
                    class="text-decoration-none">{{
                    $s->user->name
                    }}</a> ({{ $s->created_at->diffForHumans() }})</small>
            <h5 class="font-weight-600 mt-1">
                <a href="/home/show/{{ $s->slug }}" class='text-decoration-none hover '>{{
                    $s->title }}</a>
            </h5>


        </div>
        @endforeach

    </div>
    <div class="d-flex justify-content-center mb-5">

        {{ $sport->links() }}

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