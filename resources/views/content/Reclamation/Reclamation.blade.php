@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
 <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>

        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('createR')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
               <i class='bx bx-plus-circle'></i> </i> Add New Reclamation
            </a>
        </div>
    </div>
<h4 class="fw-bold py-3 mb-4">

</h4>
<!-- Contextual Classes -->

<!--Notification-->
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


<div class="card">
  <h5 class="card-header">Reclamation</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nom Reclamtion</th>
          <th>Contenu de Reclamtion</th>
          <th>Image </th>
           <th>Non User </th>
          <th>Date de creation </th>
          <th>Actions</th>

        </tr>
      </thead>
      <tbody class="table-border-bottom-0">

                    @foreach($reclamtions as $index => $val)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{$val->nomRec}}</td>
                            <td>{{$val->body}}</td>
                            <td><img alt="img" src="/img/{{ $val->image }}" width="100px"></td>
                             <td>{{$val->user_id}}</td>
                            <td>{{ $val->created_at }}</td>
                            <td>
                                <form action="" method="POST">
                                    {{ csrf_field()  }}
                                    @method('DELETE')
                                    <a class="btn btn-sm btn-success" href=""><i data-feather="eye"></i> Show</a>

                                </form>
                            </td>
                             <td>
                              <form action="{{ route('destroyR',$val->id) }}" method="POST">
                                {{ csrf_field()  }}
                                    @method('DELETE')
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('updateR', $val->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>

                    <button class="dropdown-item" type="submit" button class="btn btn-sm btn-danger"><i class="bx bx-trash me-1"></i>Delete</button>
              </div>
            </div>
          </td>

                        </tr>
                    @endforeach

      </tbody>
    </table>
  </div>
</div>



<!--/ Contextual Classes -->


<!--/ Responsive Table -->
@endsection
