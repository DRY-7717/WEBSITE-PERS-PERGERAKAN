@extends('template.main')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <h1 class="text-center mt-5">
                    Health
                </h1>
                <form action="/health/searchnewshealth">
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
            <h5 class="text-muted font-weight-medium mb-3">Health News</h5>
        </div>
    </div>
    @if ($healths->count())

    <div class="row">
        <div class="col-lg-6  mb-5 mb-sm-2">
            <div class="position-relative image-hover">

                @if ($healths[0]->image)
                <img src="{{ asset('storage/'.$healths[0]->image) }}" class="img-fluid w-100 " alt="world-news" />
                @else
                <img src="https://source.unsplash.com/1200x900?{{ $healths[0]->category->name }}"
                    class="img-fluid" alt="world-news" />
                @endif

                <span class="thumb-title"> <a
                        href="/health/searchnewshealth?category={{ $healths[0]->category->slug }}"
                        class="text-light text-decoration-none"> {{ $healths[0]->category->name }}</a></span>
            </div>
            <h1 class="font-weight-600 mt-3">
                <a href="/home/show/{{ $healths[0]->slug }}" class='text-decoration-none hover '>{{
                    $healths[0]->title }}</a>
            </h1>
            <small class="text-muted"><a
                    href="/health/searchnewshealth?user={{ $healths[0]->user->username }}"
                    class="text-decoration-none" style="font-size: 12px;">{{ $healths[0]->user->name
                    }}</a> ({{ $healths[0]->created_at->diffForHumans() }})</small>
            <p class="fs-15 font-weight-normal">
                {{ $healths[0]->excerpt }}
            </p>
        </div>
        <div class="col-lg-6  mb-5 mb-sm-2">
            <div class="row">
                @foreach ($healthside->skip(1) as $hs)

                <div class="col-sm-6  mb-5 mb-sm-2">
                    <div class="position-relative image-hover">
                        @if ($hs->image)
                        <img src="{{ asset('storage/'.$hs->image) }}" class="img-fluid w-100 " style="height: 200px"
                            alt="world-news" />
                        @else
                        <img src="https://source.unsplash.com/1200x600?{{ $hs->category->name }}" class="img-fluid"
                            alt="world-news" />
                        @endif

                        <span class="thumb-title"> <a
                                href="/health/searchnewshealth?category={{ $hs->category->slug }}"
                                class="text-light text-decoration-none"> {{ $hs->category->name }}</a></span>
                    </div>
                    <h5 class="font-weight-600 mt-3">
                        <a href="/home/show/{{ $hs->slug }}" class='text-decoration-none hover '>{{
                            $hs->title }}</a>
                    </h5>
                    <small class="text-muted" style="font-size: 12px;"><a
                            href="/health/searchnewshealth?user={{ $hs->user->username }}"
                            class="text-decoration-none">{{
                            $hs->user->name
                            }}</a> ({{ $hs->created_at->diffForHumans() }})</small>
                    <p class="fs-15 font-weight-normal">
                        {{ $hs->excerpt }}
                    </p>
                </div>
                @endforeach

            </div>

        </div>
    </div>
    {{-- All world news --}}

    <div class="row mb-4 mt-5">
        @foreach ($healths->skip(5) as $health)
        <div class=" col-12 col-sm-6  col-md-4 col-lg-3  mb-5 mb-sm-2">
            <div class="position-relative image-hover">
                @if ($health->image)
                <img src="{{ asset('storage/'. $health->image) }}" class="img-fluid w-100" style="height:250px;"
                    alt="world-news" />
                @else
                <img src="https://source.unsplash.com/500x500?{{ $health->category->name }}" class="img-fluid "
                    alt="world-news" />
                @endif
                <span class="thumb-title"> <a
                        href="/health/searchnewshealth?category={{ $health->category->slug }}"
                        class="text-light text-decoration-none"> {{ $health->category->name }}</a></span>
            </div>
            <small class="text-muted" style="font-size: 12px;"><a
                    href="/health/searchnewshealth?user={{ $health->user->username }}"
                    class="text-decoration-none">{{
                    $health->user->name
                    }}</a> ({{ $health->created_at->diffForHumans() }})</small>
            <h5 class="font-weight-600 mt-1">
                <a href="/home/show/{{ $health->slug }}" class='text-decoration-none hover '>{{
                    $health->title }}</a>
            </h5>


        </div>
        @endforeach

    </div>
    <div class="d-flex justify-content-center mb-5">

        {{ $healths->links() }}

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