@extends('layouts/contentNavbarLayout')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">update Reclamtion</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('reclamation')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All Reclamtion
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

            <form action="{{ route('updateRR', $reclamtion->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="mb-3">
                    <label for="nomRec" class="form-label">Nom Reclamtion <span class="text-danger">*</span></label>
                    <input value="{{$reclamtion->nomRec}}" id="nomRec" name="nomRec" type="text" class="form-control" placeholder="Reclamtion Name">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Contenu DE Reclamatiion <span class="text-danger">*</span></label>
                    <textarea class="form-control" placeholder="Contenu DE Reclamatiion" name="body" id="body" cols="12" rows="3">{{$reclamtion->body}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Reclamatiion Image <span class="text-danger">*</span></label>
                    <input id="image" name="image" type="file" class="form-control">
                    <img class="mt-2" src="/img/{{ $reclamtion->image }}" width="300px">
                </div>
<div class="mb-3">
    <label for="statue" class="form-label">Statut <span class="text-danger">*</span></label>
    <div>
        <label class="form-check-label">
            <input type="radio" name="statue" value=" traitée" {{ $reclamtion->statue === ' traitée' ? 'checked' : '' }}>
            traitée
        </label>
    </div>
    <div>
        <label class="form-check-label">
            <input type="radio" name="statue" value="En Cours" {{ $reclamtion->statue === 'En Cours' ? 'checked' : '' }}>
            En Cours
        </label>
    </div>
</div>

                <div>
                    <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                       Update Reclamtion Data
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection
