@extends('layouts/contentNavbarLayout')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">update Blog</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('blogg')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All Blogs
            </a>
        </div>
    </div>
<h4 class="fw-bold py-3 mb-4"></h4>
    <div class="card">
        <div class="card-body">

            @if ($errors->any())
                <div class="mt-2 alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">title<span class="text-danger">*</span></label>
                    <input value="{{$blog->title}}" id="title" name="title" type="text" class="form-control" placeholder="title">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">content <span class="text-danger">*</span></label>
                    <textarea class="form-control" placeholder="content" name="content" id="content" cols="12" rows="3">{{$blog->content}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="picture" class="form-label"> Blog picture<span class="text-danger">*</span></label>
                    <input id="picture" name="picture" type="file" class="form-control">
                    <img class="mt-2" src="/img/{{ $blog->picture }}" width="300px">
                </div>

                <div>
                    <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                       Update Blog Data
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection
