@extends('layouts/contentNavbarLayout')


@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Show Blog</h4>
        <a href="{{ route('blogg') }}" class="btn btn-info btn-icon-text">
            All Blogs
        </a>
    </div>

    <hr>

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <strong>title:</strong>

                {{ $blog->title }}
            </div>

<br>
            <div class="form-group">
                <strong>content:</strong>
                {{ $blog->content }}
            </div>
<br>

           
<br>
<br>
            <div class="form-group">
                <strong>picture:</strong>
                <br>
                <img src="/img/{{ $blog->picture }}" class="img-fluid" alt="Blog Image" style="max-width: 300px;">
            </div>
        </div>
    </div>
@endsection
