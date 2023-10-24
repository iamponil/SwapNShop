@extends('layouts/contentNavbarLayout')


@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Show Comment</h4>
        <a href="{{ route('commentss') }}" class="btn btn-info btn-icon-text">
            All Comments
        </a>
    </div>

    <hr>

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <strong>comment:</strong>

                {{ $blogCommentaire->comment }}
            </div>

<br>
            
<br>

           
<br>
<br>
           
        </div>
    </div>
@endsection
