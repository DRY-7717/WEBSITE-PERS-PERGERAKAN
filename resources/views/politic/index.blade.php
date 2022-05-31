@extends('template.main')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <h1 class="text-center mt-5">
                    Politic
                </h1>
                <form action="/politic/searchnewspolitic">
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
            <h5 class="text-muted font-weight-medium mb-3">Politic News</h5>
        </div>
    </div>
    @if ($politics->count())

    <div class="row">
        <div class="col-lg-6  mb-5 mb-sm-2">
            <div class="position-relative image-hover">

                @if ($politics[0]->image)
                <img src="{{ asset('storage/'.$politics[0]->image) }}" class="img-fluid w-100 " alt="world-news" />
                @else
                <img src="https://source.unsplash.com/1200x900?{{ $politics[0]->category->name }}" class="img-fluid"
                    alt="world-news" />
                @endif

                <span class="thumb-title"> <a href="/politic/searchnewspolitic?category={{ $politics[0]->category->slug }}"
                        class="text-light text-decoration-none"> {{ $politics[0]->category->name }}</a></span>
            </div>
            <h1 class="font-weight-600 mt-3">
                <a href="/home/show/{{ $politics[0]->slug }}" class='text-decoration-none hover '>{{
                    $politics[0]->title }}</a>
            </h1>
            <small class="text-muted"><a href="/politic/searchnewspolitic?user={{ $politics[0]->user->username }}"
                    class="text-decoration-none" style="font-size: 12px;">{{ $politics[0]->user->name
                    }}</a> ({{ $politics[0]->created_at->diffForHumans() }})</small>
            <p class="fs-15 font-weight-normal">
                {{ $politics[0]->excerpt }}
            </p>
        </div>
        <div class="col-lg-6  mb-5 mb-sm-2">
            <div class="row">
                @foreach ($politicside->skip(1) as $ps)

                <div class="col-sm-6  mb-5 mb-sm-2">
                    <div class="position-relative image-hover">
                        @if ($ps->image)
                        <img src="{{ asset('storage/'.$ps->image) }}" class="img-fluid w-100 " style="height: 200px"
                            alt="world-news" />
                        @else
                        <img src="https://source.unsplash.com/1200x600?{{ $ps->category->name }}" class="img-fluid"
                            alt="world-news" />
                        @endif

                        <span class="thumb-title"> <a href="/politic/searchnewspolitic?category={{ $ps->category->slug }}"
                                class="text-light text-decoration-none"> {{ $ps->category->name }}</a></span>
                    </div>
                    <h5 class="font-weight-600 mt-3">
                        <a href="/home/show/{{ $ps->slug }}" class='text-decoration-none hover '>{{
                            $ps->title }}</a>
                    </h5>
                    <small class="text-muted" style="font-size: 12px;"><a
                            href="/politic/searchnewspolitic?user={{ $ps->user->username }}" class="text-decoration-none">{{
                            $ps->user->name
                            }}</a> ({{ $ps->created_at->diffForHumans() }})</small>
                    <p class="fs-15 font-weight-normal">
                        {{ $ps->excerpt }}
                    </p>
                </div>
                @endforeach

            </div>

        </div>
    </div>
    {{-- All world news --}}

    <div class="row mb-4 mt-5">
        @foreach ($politics->skip(5) as $politic)
        <div class=" col-12 col-sm-6  col-md-4 col-lg-3  mb-5 mb-sm-2">
            <div class="position-relative image-hover">
                @if ($politic->image)
                <img src="{{ asset('storage/'. $politic->image) }}" class="img-fluid w-100" style="height:250px;"
                    alt="world-news" />
                @else
                <img src="https://source.unsplash.com/500x500?{{ $politic->category->name }}" class="img-fluid "
                    alt="world-news" />
                @endif
                <span class="thumb-title"> <a href="/politic/searchnewspolitic?category={{ $politic->category->slug }}"
                        class="text-light text-decoration-none"> {{ $politic->category->name }}</a></span>
            </div>
            <small class="text-muted" style="font-size: 12px;"><a
                    href="/politic/searchnewspolitic?user={{ $politic->user->username }}" class="text-decoration-none">{{
                    $politic->user->name
                    }}</a> ({{ $politic->created_at->diffForHumans() }})</small>
            <h5 class="font-weight-600 mt-1">
                <a href="/home/show/{{ $politic->slug }}" class='text-decoration-none hover '>{{
                    $politic->title }}</a>
            </h5>


        </div>
        @endforeach

    </div>
    <div class="d-flex justify-content-center mb-5">

        {{ $politics->links() }}

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