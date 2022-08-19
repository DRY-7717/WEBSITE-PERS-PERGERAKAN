@extends('layout.main')


@section('section')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Post</h1>
        </div>

        <div class="section-body">
            <div class="row justify-content-center my-1">
                <div class="col-lg-10">
                    <a href="" class="text-decoration-none text-dark text-center">
                        <h3 class="mt-3">{{ $post->title }}</h3>
                    </a>
                    <p class="text-center">
                        <small class="text-muted">
                            By <a href="#" class="text-decoration-none">
                                {{ $post->user->name }}</a> in
                            <a href="#" class="text-decoration-none">{{ $post->category->name
                                }}</a>
                        </small>
                    </p>


                    @if ($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" style="border-radius: 20px"
                        alt="{{ $post->category->name }}">
                    @else
                    <img src=" https://source.unsplash.com/1200x600?{{ $post->category->name }}" class="card-img-top"
                        style="border-radius: 20px" alt="{{ $post->category->name }}">
                    @endif

                    <article style="font-size: 17px;" class="my-5" style="text-align:justify;">
                        {!! $post->body !!}
                    </article>
                    <div class="group-button mt-5 mb-5 d-inline">
                        <a href="/dashboardadmin/post" class="btn btn-success px-3"><i
                                class="fas fa-long-arrow-alt-left"></i> Back to All post</a>
                        <a href="/dashboardadmin/post/{{ $post->slug }}/edit" class="btn btn-primary"><i
                                class="fas fa-edit"></i>
                            Edit</a>

                        <form action="/dashboardadmin/post/{{ $post->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger border-0 mx-1 rounded-full"
                                onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i>
                                Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection