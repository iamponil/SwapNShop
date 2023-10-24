@extends('layouts/contentNavbarLayout')


@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Show Reclamation</h4>
        <a href="{{ route('reclamation') }}" class="btn btn-info btn-icon-text">
            All Reclamtion
        </a>
    </div>

    <hr>

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <strong>Object:</strong>

                {{ $reclamtion->nomRec }}
            </div>

<br>
            <div class="form-group">
                <strong>Details:</strong>
                {{ $reclamtion->body }}
            </div>
<br>
           <div class="form-group">
                <strong>Name:</strong>
                {{ $reclamtion->user->name  }}
            </div>
<br>
           <div class="form-group">
                <strong>Email:</strong>
                {{ $reclamtion->user->email }}
            </div>
<br>
            <div class="form-group">
                <strong>Statue:</strong>
               @if($reclamtion->statue == 'En Cours')
                <span style="color: red; font-weight: bold;">
                    <i class="fa fa-hourglass"></i> En Cours
                </span>
            @elseif($reclamtion->statue == 'traitée')
                <span style="color: green; font-weight: bold;">
                    <i class="fa fa-check-circle"></i> traitée
                </span>
            @else
                {{ $reclamtion->statue }}
            @endif
            </div>
<br>
<br>
            <div class="form-group">
                <strong>Image:</strong>
                <br>
                <img src="/img/{{ $reclamtion->image }}" class="img-fluid" alt="Reclamation Image" style="max-width: 300px;">
            </div>
        </div>
    </div>
@endsection
