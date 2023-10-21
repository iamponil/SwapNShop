@extends('layouts/contentNavbarLayout')


@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Update Community</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    <a href="{{route('community.indexAdmin')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
      Show Communities
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

    <form action="{{ route('community.update', ['community' => $community]) }}" method="POST">
      {{ csrf_field() }}
      @method('PUT')
      <div class="mb-3">
        <label for="name" class="form-label">name <span class="text-danger">*</span></label>
        <input id="name" name="name" type="text" class="form-control" placeholder="name" value="{{$community->name}}">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">description<span class="text-danger">*</span></label>
        <textarea class="form-control" placeholder="{{$community->description}}" name="description" id="description" cols="12" rows="3"></textarea>
      </div>


      <div>
        <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
          Update Community
        </button>
      </div>


    </form>
  </div>

</div>
@endsection

