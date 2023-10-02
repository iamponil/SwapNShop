@extends('layouts/contentNavbarLayout')

@section('title', 'Create Payment')

@section('content')
    <h1>Create Payment</h1>

    <form method="POST" action="{{ route('payments.store') }}">
        @csrf
        <div class="form-group">
            <label for="montant">Amount:</label>
            <input type="text" class="form-control" id="montant" name="montant">
        </div>
        <div class="form-group">
            <label for="date_heure_paiement">Date & Time of Payment:</label>
            <input type="datetime-local" class="form-control" id="date_heure_paiement" name="date_heure_paiement">
        </div>
        <div class="form-group">
          <label for="payment_method_id">Payment Method:</label>
          <select class="form-control" id="payment_method_id" name="payment_method_id">
              @foreach ($paymentMethods as $paymentMethod)
                  <option value="{{ $paymentMethod->type_methode_paiement }}">{{ $paymentMethod->type_methode_paiement }}</option>
              @endforeach
          </select>
      </div>
        <div class="form-group">
            <label for="statut_paiement">Payment Status:</label>
            <select class="form-control" id="statut_paiement" name="statut_paiement">
                <option value="pending">Pending</option>
                <option value="validated">Validated</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" class="form-control" id="user_id" name="user_id">
        </div>
        <div class="form-group">
            <label for="commande_id">Order Reference (if applicable):</label>
            <input type="text" class="form-control" id="commande_id" name="commande_id">
        </div>
        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
