@extends('layout.main')


@section('section')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Choose post</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Choose wisely</h4>
                        </div>
                        <form action="/dashboardeditor/post/{{ $post->slug }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group row mb-4 ">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Choose</label>
                                <div class="form-check form-check-inline col-sm-12 col-md-7">
                                    @if (old('editor_choice', $post->editor_choice) == null)
                                    <input class="form-check-input ml-3" type="checkbox" id="inlineCheckbox1" value="1"
                                        name="editor_choice" id="editor_choice">
                                    @else
                                    <input class="form-check-input ml-3" type="checkbox" id="inlineCheckbox1" value="1"
                                        name="editor_choice" id="editor_choice" checked>
                                    @endif
                                    @error('editor_choice')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Choose</button>
                                </div>
                            </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
</div>
</section>
</div>


@endsection