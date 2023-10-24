@extends('layouts/contentNavbarLayout')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   @stack('scripts')
@section('title', 'Tables - Basic Tables')

@section('content')
 <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>

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
<style>
.text-blue {
    color:#6a5acd;
}
</style>
<div class="text-center mb-3">
    <a href="{{ route('filtreeR', ['statue' => 'En Cours']) }}" class="btn btn-white text-blue">Réclamations en Cours</a>
    <a href="{{ route('filtreeR', ['statue' => 'traitée']) }}" class="btn btn-white text-blue">Réclamations Traitées</a>
    <a href="{{ route('filtreeR') }}" class="btn btn-white text-blue">Toutes_les_Réclamations</a>
</div>

<br>

    <table class="table">
      <thead>
        <tr>
          <th>object Claim</th>
          <th>Reclamtion Content</th>
          <th>attached File </th>
           <th>User Name </th>
            <th>Email User </th>
          <th>Creation date </th>
             <th>statue</th>
              <th>Archive</th>
          <th>Actions</th>

        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
                    @foreach($reclamtions as $val)

                        <tr>

                            <td>{{$val->nomRec}}</td>
                            <td>{{$val->body}}</td>
                            <td><img alt="img" src="/img/{{ $val->image }}" width="100px"></td>
                             <td> {{ $val->user->name }}</td>
                              <td> {{ $val->user->email }}</td>
                            <td>{{ $val->created_at }}</td>
                                <td>
            @if($val->statue == 'En Cours')
                <span style="color: red; font-weight: bold;">
                    <i class="fa fa-hourglass"></i> En Cours
                </span>
            @elseif($val->statue == 'traitée')
                <span style="color: green; font-weight: bold;">
                    <i class="fa fa-check-circle"></i> traitée
                </span>
            @else
                {{ $val->statue }}
            @endif
        </td>
<td>
    @if ($val->statue == 'traitée')
        <a href="{{ route('archivee', $val->id) }}" class="btn btn-sm btn-primary">Archiver</a>
    @else
        <button class="btn btn-sm btn-primary" disabled>Archiver</button>
    @endif
</td>


                            <td>
                                <form action="" method="POST">
                                    {{ csrf_field()  }}
                                    @method('DELETE')
                                    <a class="btn btn-sm btn-success" href="{{ route('showR',$val->id) }}"><i data-feather="eye"></i> Show</a>

                                </form>
                            </td>
                            <td>
    @if ($val->statue == 'traitée')
        <a href="{{route('comment.form',  $val->id)}}" class="btn btn-sm btn-secondary"></i> Repondre</a>
    @else
        <button class="btn btn-sm btn-secondary" disabled></i> Repondre</button>
    @endif
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
