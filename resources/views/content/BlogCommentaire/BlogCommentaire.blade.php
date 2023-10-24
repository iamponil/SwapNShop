@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
 <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>

        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('createComments')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
               <i class='bx bx-plus-circle'></i> </i> Add New Comment
            </a>
        </div>
    </div>
<h4 class="fw-bold py-3 mb-4">

</h4>
@notifyCss
<!-- Contextual Classes -->

<!--Notification-->
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


<div class="card">
  <h5 class="card-header"></h5>
  <div class="table-responsive text-nowrap">
    <table class="table">

      <thead>
        <tr>
          <th>#</th>
          <th>blog_id </th>
          <th>comment</th>
     

          <th>creacted at</th>
          <th>Actions</th>

        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
                    @foreach($comment as $index => $val)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{$val->blog_id}}</td>
                            <td>{{$val->comment}}</td>
                            <td>{{ $val->created_at }}</td>
                            <td>
                                <form action="" method="POST">
                                    {{ csrf_field()  }}
                                    @method('DELETE')
                                    <a class="btn btn-sm btn-success" href="{{ route('showC',$val->id) }}"><i data-feather="eye"></i> Show</a>
                                </form>
                            </td>
                             <td>
                              <form action="{{ route('destroyC',$val->id) }}" method="POST">
                                {{ csrf_field()  }}
                                    @method('DELETE')
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">

                    <button class="dropdown-item" type="submit" button class="btn btn-sm btn-danger"><i class="bx bx-trash me-1"></i>Delete</button>
              </div>
            </div>
          </td>

   
                        </tr>
                    @endforeach
                    @notifyJs
                    <x-notify::notify />

      </tbody>
    </table>
  </div>
</div>
@notifyJs
<x-notify::notify />
@endsection
