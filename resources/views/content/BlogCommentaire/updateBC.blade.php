@extends('layouts/contentNavbarLayout')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">update Comment</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('commentss')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All Comments
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

            <form action="{{ route('updateCC', $comments->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')

                <div class="mb-3">
                    <label for="comment" class="form-label">comment <span class="text-danger">*</span></label>
                    <textarea class="form-control" placeholder="comment" name="comment" id="comment" cols="12" rows="3">{{$comments->content}}</textarea>
                </div>



                <div>
                    <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                       Update Comment Data
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection
