@extends('template.main')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <h1 class="text-center mt-5">
                    Finance
                </h1>
                <form action="/finance/searchnewsfinance">
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
            <h5 class="text-muted font-weight-medium mb-3">Finance News</h5>
        </div>
    </div>
    @if ($finances->count())

    <div class="row">
        <div class="col-lg-6  mb-5 mb-sm-2">
            <div class="position-relative image-hover">

                @if ($finances[0]->image)
                <img src="{{ asset('storage/'.$finances[0]->image) }}" class="img-fluid w-100 " alt="world-news" />
                @else
                <img src="https://source.unsplash.com/1200x900?{{ $finances[0]->category->name }}" class="img-fluid"
                    alt="world-news" />
                @endif

                <span class="thumb-title"> <a href="/finance/searchnewsfinance?category={{ $finances[0]->category->slug }}"
                        class="text-light text-decoration-none"> {{ $finances[0]->category->name }}</a></span>
            </div>
            <h1 class="font-weight-600 mt-3">
                <a href="/home/show/{{ $finances[0]->slug }}" class='text-decoration-none hover '>{{
                    $finances[0]->title }}</a>
            </h1>
            <small class="text-muted"><a href="/finance/searchnewsfinance?user={{ $finances[0]->user->username }}"
                    class="text-decoration-none" style="font-size: 12px;">{{ $finances[0]->user->name
                    }}</a> ({{ $finances[0]->created_at->diffForHumans() }})</small>
            <p class="fs-15 font-weight-normal">
                {{ $finances[0]->excerpt }}
            </p>
        </div>
        <div class="col-lg-6  mb-5 mb-sm-2">
            <div class="row">
                @foreach ($financeside->skip(1) as $fs)

                <div class="col-sm-6  mb-5 mb-sm-2">
                    <div class="position-relative image-hover">
                        @if ($fs->image)
                        <img src="{{ asset('storage/'.$fs->image) }}" class="img-fluid w-100 " style="height: 200px"
                            alt="world-news" />
                        @else
                        <img src="https://source.unsplash.com/1200x600?{{ $fs->category->name }}" class="img-fluid"
                            alt="world-news" />
                        @endif

                        <span class="thumb-title"> <a href="/finance/searchnewsfinance?category={{ $fs->category->slug }}"
                                class="text-light text-decoration-none"> {{ $fs->category->name }}</a></span>
                    </div>
                    <h5 class="font-weight-600 mt-3">
                        <a href="/home/show/{{ $fs->slug }}" class='text-decoration-none hover '>{{
                            $fs->title }}</a>
                    </h5>
                    <small class="text-muted" style="font-size: 12px;"><a
                            href="/finance/searchnewsfinance?user={{ $fs->user->username }}" class="text-decoration-none">{{
                            $fs->user->name
                            }}</a> ({{ $fs->created_at->diffForHumans() }})</small>
                    <p class="fs-15 font-weight-normal">
                        {{ $fs->excerpt }}
                    </p>
                </div>
                @endforeach

            </div>

        </div>
    </div>
    {{-- All world news --}}

    <div class="row mb-4 mt-5">
        @foreach ($finances->skip(5) as $finance)
        <div class=" col-12 col-sm-6  col-md-4 col-lg-3  mb-5 mb-sm-2">
            <div class="position-relative image-hover">
                @if ($finance->image)
                <img src="{{ asset('storage/'. $finance->image) }}" class="img-fluid w-100" style="height:250px;"
                    alt="world-news" />
                @else
                <img src="https://source.unsplash.com/500x500?{{ $finance->category->name }}" class="img-fluid "
                    alt="world-news" />
                @endif
                <span class="thumb-title"> <a href="/finance/searchnewsfinance?category={{ $finance->category->slug }}"
                        class="text-light text-decoration-none"> {{ $finance->category->name }}</a></span>
            </div>
            <small class="text-muted" style="font-size: 12px;"><a
                    href="/finance/searchnewsfinance?user={{ $finance->user->username }}" class="text-decoration-none">{{
                    $finance->user->name
                    }}</a> ({{ $finance->created_at->diffForHumans() }})</small>
            <h5 class="font-weight-600 mt-1">
                <a href="/home/show/{{ $finance->slug }}" class='text-decoration-none hover '>{{
                    $finance->title }}</a>
            </h5>


        </div>
        @endforeach

    </div>
    <div class="d-flex justify-content-center mb-5">

        {{ $finances->links() }}

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