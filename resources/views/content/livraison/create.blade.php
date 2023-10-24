@extends('layouts/contentNavbarLayout')


@section('content')
  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Add New Blog</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <a href="" class="btn btn-info btn-icon-text mb-2 mb-md-0">
        Livraison
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

        <form action="{{ route('showLivraisonadded') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="Id_user">Utilisateur :</label>
            <select name="Id_user" class="form-control">
              @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="Id_adresse_livraison">Adresse de livraison :</label>
            <select name="Id_adresse_livraison" class="form-control">
              @foreach ($adressesLivraison as $adresse)
                <option value="{{ $adresse->id }}">{{ $adresse->nom }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="Id_echange">Échange :</label>
            <select name="Id_echange" class="form-control">
              @foreach ($echanges as $echange)
                <option value="{{ $echange->id }}">{{ $echange->id }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="Date_envoi">Date d'envoi :</label>
            <input type="date" name="Date_envoi" class="form-control">
          </div>
          <div class="form-group">
            <label for="Statut">Statut :</label>
            <select class="form-control" id="Statut" name="Statut">
              <option value="En attente">En attente</option>
              <option value="En cours">En cours</option>
              <option value="Livré">Livré</option>
            </select>
          </div>
          <hr/>
          <button type="submit" class="btn btn-primary">Ajouter la livraison</button>
        </form>
    </div>

  </div>
@endsection

