@extends('template.main')


@section('section')
<div class="container">
    <h1 class="mt-4">{{ $post->title }}</h1>
    <p class="mb-3"><small class="">Author by <a href="" class="text-decoration-none">{{ $post->user->name }} </a> in <a
                href="" class="text-decoration-none">{{ $post->category->name
                }}</a></small></p>
    @if ($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="rounded w-100 " style="height: 450px"
        style="object-fit: cover; object-position:center;">
    @else
    <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}" alt="" class="rounded w-100 "
        style="height: 450px" style="object-fit: cover; object-position:center;">
    @endif


    <article class="mt-4" style="text-align: justify;">
        {!! $post->body !!}
    </article>
</div>
@endsection