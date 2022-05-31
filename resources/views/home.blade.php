@extends('template.main')
@section('section')
<div class="container">
  <div class="banner-top-thumb-wrap">
    <div class="d-lg-flex justify-content-between align-items-center">
      <div class="d-flex justify-content-between  mb-3 mb-lg-0">
        <div>
          @if ($posts[4]->image)
          <img src="{{ asset('storage/'.$posts[4]->image) }}" class="banner-top-thumb " alt="world-news" />
          @else
          <img src="https://source.unsplash.com/1200x600?{{ $posts[4]->category->name }}" alt="thumb"
            class="banner-top-thumb" />
          @endif
        </div>
        <h6 class="m-0 font-weight-bold">
          <a href="/home/show/{{ $posts[4]->slug }}" class='text-decoration-none hover'>{{ $posts[4]->title }}</a>
        </h6>
      </div>
      <div class="d-flex justify-content-between  mb-3 mb-lg-0">
        <div>
          @if ($posts[5]->image)
          <img src="{{ asset('storage/'.$posts[5]->image) }}" class="banner-top-thumb " alt="world-news" />
          @else
          <img src="https://source.unsplash.com/1200x600?{{ $posts[5]->category->name }}" alt="thumb"
            class="banner-top-thumb" />
          @endif
        </div>
        <h6 class="m-0 font-weight-bold">
          <a href="/home/show/{{ $posts[5]->slug }}" class='text-decoration-none hover'>{{ $posts[5]->title }}</a>
        </h6>
      </div>
      <div class="d-flex justify-content-between  mb-3 mb-lg-0">
        <div>
          @if ($posts[6]->image)
          <img src="{{ asset('storage/'.$posts[6]->image) }}" class="banner-top-thumb " alt="world-news" />
          @else
          <img src="https://source.unsplash.com/1200x600?{{ $posts[6]->category->name }}" alt="thumb"
            class="banner-top-thumb" />
          @endif
        </div>
        <h6 class="m-0 font-weight-bold">
          <a href="/home/show/{{ $posts[6]->slug }}" class='text-decoration-none hover'>{{ $posts[6]->title }}</a>
        </h6>
      </div>
      <div class="d-flex justify-content-between  mb-3 mb-lg-0">
        <div>
          @if ($posts[7]->image)
          <img src="{{ asset('storage/'.$posts[7]->image) }}" class="banner-top-thumb " alt="world-news" />
          @else
          <img src="https://source.unsplash.com/1200x600?{{ $posts[7]->category->name }}" alt="thumb"
            class="banner-top-thumb" />
          @endif
        </div>
        <h6 class="m-0 font-weight-bold">
          <a href="/home/show/{{ $posts[7]->slug }}" class='text-decoration-none hover'>{{ $posts[7]->title }}</a>
        </h6>
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-lg-8">
      <div class="owl-carousel owl-theme" id="main-banner-carousel">
        <div class="item">
          <div class="carousel-content-wrapper mb-2">
            <div class="carousel-content">
              <h1 class="font-weight-bold">
                <a href="/home/show/{{ $posts[0]->slug }}" class='text-decoration-none hover text-white'>{{
                  $posts[0]->title }}</a>
              </h1>
              <h5 class="font-weight-normal  m-0">
                {{ $posts[0]->excerpt }}
              </h5>
              <p class="text-color m-0 pt-2 d-flex align-items-center">
                <span class="fs-10 mr-1">2 hours ago</span>
              </p>
            </div>
            <div class="carousel-image">
              @if ($posts[0]->image)
              <img src="{{ asset('storage/'.$posts[0]->image) }}" alt="" class="imgC" />
              @else
              <img src="https://source.unsplash.com/1200x600?{{ $posts[0]->category->name }}" alt="" />
              @endif
            </div>
          </div>
        </div>
        <div class="item">
          <div class="carousel-content-wrapper mb-2">
            <div class="carousel-content">
              <h1 class="font-weight-bold">
                <a href="/home/show/{{ $posts[1]->slug }}" class='text-decoration-none hover text-white'>{{
                  $posts[1]->title }}</a>

              </h1>
              <h5 class="font-weight-normal  m-0">
                {{ $posts[1]->excerpt }}
              </h5>
              <p class="text-color m-0 pt-2 d-flex align-items-center">
                <span class="fs-10 mr-1">2 hours ago</span>
              </p>
            </div>
            <div class="carousel-image">
              @if ($posts[1]->image)
              <img src="{{ asset('storage/'.$posts[1]->image) }}" alt="" class="imgC" />
              @else
              <img src="https://source.unsplash.com/1200x600?{{ $posts[1]->category->name }}" alt="" />
              @endif
            </div>
          </div>
        </div>
        <div class="item">
          <div class="carousel-content-wrapper mb-2">
            <div class="carousel-content">
              <h1 class="font-weight-bold">
                <a href="/home/show/{{ $posts[2]->slug }}" class='text-decoration-none hover text-white'>{{
                  $posts[2]->title }}</a>

              </h1>
              <h5 class="font-weight-normal  m-0">
                {{ $posts[2]->excerpt }}
              </h5>
              <p class="text-color m-0 pt-2 d-flex align-items-center">
                <span class="fs-10 mr-1">2 hours ago</span>
              </p>
            </div>
            <div class="carousel-image">
              @if ($posts[2]->image)
              <img src="{{ asset('storage/'.$posts[2]->image) }}" alt="" class="imgC" />
              @else
              <img src="https://source.unsplash.com/1200x600?{{ $posts[2]->category->name }}" alt="" />
              @endif
            </div>
          </div>
        </div>
        <div class="item">
          <div class="carousel-content-wrapper mb-2">
            <div class="carousel-content">
              <h1 class="font-weight-bold">
                <a href="/home/show/{{ $posts[3]->slug }}" class='text-decoration-none hover text-white'>{{
                  $posts[3]->title }}</a>

              </h1>
              <h5 class="font-weight-normal  m-0">
                {{ $posts[3]->excerpt }}
              </h5>
              <p class="text-color m-0 pt-2 d-flex align-items-center">
                <span class="fs-10 mr-1">2 hours ago</span>
              </p>
            </div>
            <div class="carousel-image">
              @if ($posts[3]->image)
              <img src="{{ asset('storage/'.$posts[3]->image) }}" alt="" class="imgC" />
              @else
              <img src="https://source.unsplash.com/1200x600?{{ $posts[3]->category->name }}" alt="" />
              @endif
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-lg-4">
      <div class="row">
        <div class="col-sm-6">
          <div class="py-3 border-bottom">
            <div class="d-flex align-items-center pb-2">
              @if ($posts[8]->user->image)
              <img src="{{ asset('storage/'.$posts[8]->user->image) }}" class="img-xs img-rounded mr-2" alt="thumb" />
              @else
              <img src="https://source.unsplash.com/1200x600?{{ $posts[8]->category->name }}"
                class="img-xs img-rounded mr-2" alt="thumb" />
              @endif
              <span class="fs-12 text-muted">{{ $posts[8]->user->name }}</span>
            </div>
            <p class="fs-14 m-0 font-weight-medium line-height-sm">
              <a href="/home/show/{{ $posts[8]->slug }}" class='text-decoration-none hover'>{{ $posts[8]->title }}</a>
            </p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="py-3 border-bottom">
            <div class="d-flex align-items-center pb-2">
              @if ($posts[9]->user->image)
              <img src="{{ asset('storage/'.$posts[9]->user->image) }}" class="img-xs img-rounded mr-2" alt="thumb" />
              @else
              <img src="https://source.unsplash.com/1200x600?{{ $posts[9]->category->name }}"
                class="img-xs img-rounded mr-2" alt="thumb" />
              @endif
              <span class="fs-12 text-muted">{{ $posts[9]->user->name }}</span>
            </div>
            <p class="fs-14 m-0 font-weight-medium line-height-sm">
              <a href="/home/show/{{ $posts[9]->slug }}" class='text-decoration-none hover'>{{ $posts[9]->title }}</a>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="pt-4 pb-4 border-bottom">
            <div class="d-flex align-items-center pb-2">
              @if ($posts[10]->user->image)
              <img src="{{ asset('storage/'.$posts[10]->user->image) }}" class="img-xs img-rounded mr-2" alt="thumb" />
              @else
              <img src="https://source.unsplash.com/1200x600?{{ $posts[10]->category->name }}"
                class="img-xs img-rounded mr-2" alt="thumb" />
              @endif
              <span class="fs-12 text-muted">{{ $posts[10]->user->name }}</span>
            </div>
            <p class="fs-14 m-0 font-weight-medium line-height-sm">
              <a href="/home/show/{{ $posts[10]->slug }}" class='text-decoration-none hover'>{{ $posts[10]->title }}</a>
            </p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="pt-3 pb-4 border-bottom">
            <div class="d-flex align-items-center pb-2">
              @if ($posts[11]->user->image)
              <img src="{{ asset('storage/'.$posts[11]->user->image) }}" class="img-xs img-rounded mr-2" alt="thumb" />
              @else
              <img src="https://source.unsplash.com/1200x600?{{ $posts[11]->category->name }}"
                class="img-xs img-rounded mr-2" alt="thumb" />
              @endif
              <span class="fs-12 text-muted">{{ $posts[11]->user->name }}</span>
            </div>
            <p class="fs-14 m-0 font-weight-medium line-height-sm">
              <a href="/home/show/{{ $posts[11]->slug }}" class='text-decoration-none hover'>{{ $posts[11]->title }}</a>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="pt-4 pb-4">
            <div class="d-flex align-items-center pb-2">
              @if ($posts[12]->user->image)
              <img src="{{ asset('storage/'.$posts[12]->user->image) }}" class="img-xs img-rounded mr-2" alt="thumb" />
              @else
              <img src="https://source.unsplash.com/1200x600?{{ $posts[12]->category->name }}"
                class="img-xs img-rounded mr-2" alt="thumb" />
              @endif
              <span class="fs-12 text-muted">{{ $posts[12]->user->name }}</span>
            </div>
            <p class="fs-14 m-0 font-weight-medium line-height-sm">
              <a href="/home/show/{{ $posts[12]->slug }}" class='text-decoration-none hover'>{{ $posts[12]->title }}</a>
            </p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="pt-3 pb-4">
            <div class="d-flex align-items-center pb-2">
              @if ($posts[13]->user->image)
              <img src="{{ asset('storage/'.$posts[13]->user->image) }}" class="img-xs img-rounded mr-2" alt="thumb" />
              @else
              <img src="https://source.unsplash.com/1200x600?{{ $posts[13]->category->name }}"
                class="img-xs img-rounded mr-2" alt="thumb" />
              @endif
              <span class="fs-12 text-muted">{{ $posts[13]->user->name }}</span>
            </div>
            <p class="fs-14 m-0 font-weight-medium line-height-sm">
              <a href="/home/show/{{ $posts[13]->slug }}" class='text-decoration-none hover'>{{ $posts[13]->title }}</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="world-news">
    <div class="row">
      <div class="col-sm-12">
        <div class="d-flex position-relative  float-left">
          <h3 class="section-title">World News</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-sm-6 grid-margin mb-5 mb-sm-2">
        <div class="position-relative image-hover">
          @if ($world[0]->image)
          <img src="{{ asset('storage/'.$world[0]->image) }}" class="img-fluid w-img" alt="world-news" />
          @else
          <img src="https://source.unsplash.com/500x500?{{ $world[0]->category->name }}" class="img-fluid"
            alt="world-news" />
          @endif

          <span class="thumb-title">{{ $world[0]->category->name }}</span>
        </div>
        <h5 class="font-weight-bold mt-3">
          <a href="/home/show/{{ $world[0]->slug }}" class='text-decoration-none hover'>{{ $world[0]->title }}</a>
        </h5>
        <p class="fs-15 font-weight-normal">
          {{ $world[0]->excerpt }}
        </p>
        <a href="/home/show/{{ $world[0]->slug }}" class="font-weight-bold text-dark pt-2">Read Article</a>
      </div>
      <div class="col-lg-3 col-sm-6 grid-margin mb-5 mb-sm-2">
        <div class="position-relative image-hover">
          @if ($world[1]->image)
          <img src="{{ asset('storage/'.$world[1]->image) }}" class="img-fluid w-img" alt="world-news" />
          @else
          <img src="https://source.unsplash.com/500x500?{{ $world[1]->category->name }}" class="img-fluid"
            alt="world-news" />
          @endif

          <span class="thumb-title">{{ $world[1]->category->name }}</span>
        </div>
        <h5 class="font-weight-bold mt-3">
          <a href="/home/show/{{ $world[1]->slug }}" class='text-decoration-none hover'>{{ $world[1]->title }}</a>
        </h5>
        <p class="fs-15 font-weight-normal">
          {{ $world[1]->excerpt }}
        </p>
        <a href="/home/show/{{ $world[1]->slug }}" class="font-weight-bold text-dark pt-2">Read Article</a>
      </div>
      <div class="col-lg-3 col-sm-6 grid-margin mb-5 mb-sm-2">
        <div class="position-relative image-hover">
          @if ($world[2]->image)
          <img src="{{ asset('storage/'.$world[2]->image) }}" class="img-fluid w-img" alt="world-news" />
          @else
          <img src="https://source.unsplash.com/500x500?{{ $world[2]->category->name }}" class="img-fluid"
            alt="world-news" />
          @endif

          <span class="thumb-title">{{ $world[2]->category->name }}</span>
        </div>
        <h5 class="font-weight-bold mt-3">
          <a href="/home/show/{{ $world[2]->slug }}" class='text-decoration-none hover'>{{ $world[2]->title }}</a>
        </h5>
        <p class="fs-15 font-weight-normal">
          {{ $world[2]->excerpt }}
        </p>
        <a href="/home/show/{{ $world[2]->slug }}" class="font-weight-bold text-dark pt-2">Read Article</a>
      </div>
      <div class="col-lg-3 col-sm-6 grid-margin mb-5 mb-sm-2">
        <div class="position-relative image-hover">
          @if ($world[3]->image)
          <img src="{{ asset('storage/'.$world[3]->image) }}" class="img-fluid w-img" alt="world-news" />
          @else
          <img src="https://source.unsplash.com/500x500?{{ $world[3]->category->name }}" class="img-fluid"
            alt="world-news" />
          @endif

          <span class="thumb-title">{{ $world[3]->category->name }}</span>
        </div>
        <h5 class="font-weight-bold mt-3">
          <a href="/home/show/{{ $world[3]->slug }}" class='text-decoration-none hover'>{{ $world[3]->title }}</a>
        </h5>
        <p class="fs-15 font-weight-normal">
          {{ $world[3]->excerpt }}
        </p>
        <a href="/home/show/{{ $world[3]->slug }}" class="font-weight-bold text-dark pt-2">Read Article</a>
      </div>
    </div>
  </div>
  <div class="editors-news">
    <div class="row">
      <div class="col-lg-3">
        <div class="d-flex position-relative float-left">
          <h3 class="section-title">Some News</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6  mb-5 mb-sm-2">
        <div class="position-relative image-hover">
          @if ($posts[17]->image)
          <img src="{{ asset('storage/'.$posts[17]->image) }}" class="img-fluid" alt="world-news" />
          @else
          <img src="https://source.unsplash.com/500x500?{{ $posts[17]->category->name }}" class="img-fluid"
            alt="world-news" />
          @endif

          <span class="thumb-title">{{ $posts[17]->category->name }}</span>
        </div>
        <h1 class="font-weight-600 mt-3">
          <a href="/home/show/{{ $posts[17]->slug }}" class='text-decoration-none hover'>{{ $posts[17]->title }}</a>
        </h1>
        <p class="fs-15 font-weight-normal">
          {{ $posts[17]->excerpt }}
        </p>
      </div>
      <div class="col-lg-6  mb-5 mb-sm-2">
        <div class="row">
          <div class="col-sm-6  mb-5 mb-sm-2">
            <div class="position-relative image-hover">
              @if ($posts[18]->image)
              <img src="{{ asset('storage/'.$posts[18]->image) }}" class="img-fluid" alt="world-news" />
              @else
              <img src="https://source.unsplash.com/500x500?{{ $posts[18]->category->name }}" class="img-fluid"
                alt="world-news" />
              @endif
              <span class="thumb-title">{{ $posts[18]->category->name }}</span>
            </div>
            <h5 class="font-weight-600 mt-3">
              <a href="/home/show/{{ $posts[18]->slug }}" class='text-decoration-none hover'>{{ $posts[18]->title }}</a>
            </h5>
            <p class="fs-15 font-weight-normal">
              {{ $posts[18]->excerpt }}
            </p>
          </div>
          <div class="col-sm-6  mb-5 mb-sm-2">
            <div class="position-relative image-hover">
              @if ($posts[19]->image)
              <img src="{{ asset('storage/'.$posts[19]->image) }}" class="img-fluid" alt="world-news" />
              @else
              <img src="https://source.unsplash.com/500x500?{{ $posts[19]->category->name }}" class="img-fluid"
                alt="world-news" />
              @endif
              <span class="thumb-title">{{ $posts[19]->category->name }}</span>
            </div>
            <h5 class="font-weight-600 mt-3">
              <a href="/home/show/{{ $posts[19]->slug }}" class='text-decoration-none hover'>{{ $posts[19]->title }}</a>
            </h5>
            <p class="fs-15 font-weight-normal">
              {{ $posts[19]->excerpt }}
            </p>
          </div>
          <div class="row mt-3">
            <div class="col-sm-6  mb-5 mb-sm-2">
              <div class="position-relative image-hover">
                @if ($posts[20]->image)
                <img src="{{ asset('storage/'.$posts[20]->image) }}" class="img-fluid" alt="world-news" />
                @else
                <img src="https://source.unsplash.com/500x500?{{ $posts[20]->category->name }}" class="img-fluid"
                  alt="world-news" />
                @endif
                <span class="thumb-title">{{ $posts[20]->category->name }}</span>
              </div>
              <h5 class="font-weight-600 mt-3">
                <a href="/home/show/{{ $posts[20]->slug }}" class='text-decoration-none hover'>{{ $posts[20]->title
                  }}</a>
              </h5>
              <p class="fs-15 font-weight-normal">
                {{ $posts[20]->excerpt }}
              </p>
            </div>
            <div class="col-sm-6  mb-5 mb-sm-2">
              <div class="position-relative image-hover">
                @if ($posts[21]->image)
                <img src="{{ asset('storage/'.$posts[21]->image) }}" class="img-fluid" alt="world-news" />
                @else
                <img src="https://source.unsplash.com/500x500?{{ $posts[21]->category->name }}" class="img-fluid"
                  alt="world-news" />
                @endif
                <span class="thumb-title">{{ $posts[21]->category->name }}</span>
              </div>
              <h5 class="font-weight-600 mt-3">
                <a href="/home/show/{{ $posts[21]->slug }}" class='text-decoration-none hover'>{{ $posts[21]->title
                  }}</a>
              </h5>
              <p class="fs-15 font-weight-normal">
                {{ $posts[21]->excerpt }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="popular-news">
      <div class="row">
        <div class="col-lg-3">
          <div class="d-flex position-relative float-left">
            <h3 class="section-title">Editor choice</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-9">
          <div class="row">
            @foreach ($editorChoice as $ec)
            <div class="col-sm-4  mb-5 mb-sm-2">
              <div class="position-relative image-hover">
                @if ($ec->image)
                <img src="{{ asset('storage/'.$ec->image) }}" class="img-fluid w-img" alt="world-news" />
                @else
                <img src="https://source.unsplash.com/500x500?{{ $ec->category->name }}" class="img-fluid"
                  alt="world-news" />
                @endif
                <span class="thumb-title">{{ $ec->category->name }}</span>
              </div>
              <h5 class="font-weight-600 mt-3">
                <a href="/home/show/{{ $ec->slug }}" class='text-decoration-none hover'>{{ $ec->title
                  }}</a>
              </h5>
            </div>
            @endforeach


          </div>

        </div>
        <div class="col-lg-3">
          <div class="row">
            <div class="col-sm-12">
              <div class="d-flex position-relative float-left">
                <h3 class="section-title">Latest News</h3>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="border-bottom pb-3">
                <h5 class="m-0 font-weight-bold">
                  <a href="/home/show/{{ $posts[0]->slug }}" class='text-decoration-none hover'>{{ $posts[0]->title
                    }}</a>
                </h5>
                <p class="text-color m-0 d-flex align-items-center">
                  <span class="fs-10 mr-1">{{ $posts[0]->created_at->diffForHumans() }}</span>

                </p>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="border-bottom pt-4 pb-3">
                <h5 class="m-0 font-weight-bold">
                  <a href="/home/show/{{ $posts[1]->slug }}" class='text-decoration-none hover'>{{ $posts[1]->title
                    }}</a>
                </h5>
                <p class="text-color m-0 d-flex align-items-center">
                  <span class="fs-10 mr-1">{{ $posts[1]->created_at->diffForHumans() }}</span>

                </p>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="border-bottom pt-4 pb-3">
                <h5 class="m-0 font-weight-bold">
                  <a href="/home/show/{{ $posts[2]->slug }}" class='text-decoration-none hover'>{{ $posts[2]->title
                    }}</a>
                </h5>
                <p class="text-color m-0 d-flex align-items-center">
                  <span class="fs-10 mr-1">{{ $posts[2]->created_at->diffForHumans() }}</span>

                </p>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="pt-4">
                <h5 class="m-0 font-weight-bold">
                  <a href="/home/show/{{ $posts[3]->slug }}" class='text-decoration-none hover'>{{ $posts[3]->title
                    }}</a>
                </h5>
                <p class="text-color m-0 d-flex align-items-center">
                  <span class="fs-10 mr-1">{{ $posts[3]->created_at->diffForHumans() }}</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        @foreach ($ads as $ad)
        <div class="col-lg-4 col-md-6 col-sm-12">
          <a href="{{ $ad->link }}" target="blank"><img src="{{ asset('storage/'.$ad->image) }}" alt="{{ $ad->image }}" style="width: 100%; height: 100%;"></a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- main-panel ends -->
  <!-- container-scroller ends -->
  @endsection