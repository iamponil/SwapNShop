@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    <a class="btn btn-secondary btn-icon-text mb-2 mb-md-0" href="{{ Route('pdf') }}" id="btnExport">
        <i class="bx bx-plus-circle"></i> PDF
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
    <h5 class="card-header"></h5>
    <div class="table-responsive text-nowrap">
    <table class="table" id="maTable">
        <thead>
        <tr>
          <th>id</th>
          <th>echange</th>
          <th>adresse de livraison</th>
          <th>utilisateur</th>
          <th>date d'envoie</th>
          <th>Status</th>

        </tr>
        </thead>
        <tbody class="table-border-bottom-0">

        @foreach($livraison as $index => $val)
          <tr>
          <td>{{$val->id}}</td>
        <td>{{$val->Id_echange}}</td>
        <td>{{$val->adresseComp}}</td>
        <td>{{$val->userName}}</td> <!-- Affiche le nom de l'utilisateur -->
        <td>{{$val->Date_envoi}}</td>
            <td>
              <form action="{{ route('updateStatusLivraison', ['id' => $val->id]) }}" method="get">
                <select onchange="this.form.submit()" name="status">
                  <option @if($val->Statut == "En cours")selected @endif value="En cours">En cours</option>
                  <option @if($val->Statut == "En attente")selected @endif value="En attente">En attente</option>
                  <option @if($val->Statut == "livré")selected @endif value="livré">livré</option>
                </select>
              </form>

            </td>


          </tr>
        @endforeach

        </tbody>
      </table>
    </div>
  </div>



  <!--/ Contextual Classes -->


  <!--/ Responsive Table -->
@push('scripts')
<script type="text/javascript">
    $("body").on("click", "#btnExport", function () {
        // Sélectionnez la table à convertir en PDF
        var table = $('#maTable')[0];

        // Initialisez un objet jsPDF
        var pdf = new jsPDF();

        // Options de format pour la page PDF
        var pdfOptions = {
            orientation: 'landscape',
            unit: 'pt',
            format: 'a4'
        };

        // Générez une chaîne de données HTML à partir de la table
        var tableData = '<table>' + table.outerHTML + '</table>';

        // Ajoutez la chaîne de données HTML au PDF
        pdf.fromHTML(tableData, 15, 15, pdfOptions);

        // Téléchargez le PDF avec un nom spécifié
        pdf.save("export.pdf");
    });
</script>



<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.3/js/buttons.print.min.js"></script>
@endpush

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.3/css/buttons.dataTables.min.css">
@endpush
@endsection
