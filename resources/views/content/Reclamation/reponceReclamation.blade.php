@extends('layouts/contentNavbarLayout')


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Answer </h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('reclamation')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All Reclamtion
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
  <!-- resources/views/comment-form.blade.php -->
<form method="post" action="{{ route('comment.store', $reclamation->id) }}">
    @csrf
    <div class="form-group">
        <label for="comment"> Answer :</label>
        <textarea name="comment" id="comment" class="form-control"></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary"> Add Answer</button>
</form>


        </div>

    </div>
@endsection

