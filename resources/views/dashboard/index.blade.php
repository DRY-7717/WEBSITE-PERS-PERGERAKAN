@extends('layout.main')


@section('section')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total user</h4>
                            </div>
                            <div class="card-body">
                                {{ $users->count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total post</h4>
                            </div>
                            <div class="card-body">
                                {{ $posts->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if (session('message'))
                    {!! session('message') !!}
                    @endif
                    <div class="card shadow rounded">
                        <div class="card-header d-flex justify-content-between">
                            <h4>All my post</h4>
                            <a href="/dashboardadmin/post/create" class="btn btn-primary"><i class="fas fa-plus"></i> Create
                                new post</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $post->title }}</td>

                                            <td>
                                                {{ $post->category->name }}
                                            </td>
                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                            <td>
                                                <form action="/dashboardadmin/post/{{ $post->slug }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('are you sure?')"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                                <a href=" /dashboardadmin/post/{{ $post->slug }}" class="btn btn-info"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="/dashboardadmin/post/{{ $post->slug }}/edit"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection