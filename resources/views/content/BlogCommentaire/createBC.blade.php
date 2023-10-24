@extends('layouts/contentNavbarLayout')


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Add New Comment</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('commentss')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All Comments
            </a>
        </div>
    </div>
<h4 class="fw-bold py-3 mb-4">

</h4>
    <div class="card">
        <div class="card-body">

           @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif

            <form action="{{ route('commentBlog.store',$blogCommentaire->id) }}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="mb-3">
                    <label for="comment" class="form-label">comment<span class="text-danger">*</span></label>
                    <textarea class="form-control" placeholder="comment" name="comment" id="comment" cols="12" rows="3"></textarea>
                </div>

               




                <div>
                    <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                       Save Comment Data
                    </button>

                </div>


            </form>
        </div>

    </div>
@endsection
