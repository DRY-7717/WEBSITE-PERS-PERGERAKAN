@extends('layout.main')


@section('section')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ads</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @if (session('message'))
                    {!! session('message') !!}
                    @endif
                    <div class="card shadow rounded">
                        <div class="card-header d-flex justify-content-between">
                            <h4>All ads</h4>
                            <a href="/dashboard/iklan/create" class="btn btn-primary"><i class="fas fa-plus"></i> Create
                                new ads</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Name</th>
                                            <th>Link</th>
                                            <th>Image</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ads as $ad)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $ad->name }}</td>
                                            <td>{{ $ad->link }}</td>
                                            <td><img src="{{ asset('storage/'. $ad->image) }}" alt=""
                                                    style="width: 100px;height: 60px;"></td>
                                            <td>{{ $ad->created_at->diffForHumans() }}</td>
                                            <td>
                                                <form action="/dashboard/iklan/{{ $ad->id}}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('are you sure?')"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                                <a href="/dashboard/iklan/{{ $ad->id }}/edit" class="btn btn-primary"><i
                                                        class="fas fa-edit"></i></a>
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