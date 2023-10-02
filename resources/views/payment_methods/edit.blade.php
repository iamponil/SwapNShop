@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Payment Method')

@section('content')
    <h1>Edit Payment Method</h1>

    <form method="POST" action="{{ route('payment_methods.update', $paymentMethod->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="type_methode_paiement">Payment Type:</label>
            <input type="text" class="form-control" id="type_methode_paiement" name="type_methode_paiement" value="{{ $paymentMethod->type_methode_paiement }}">
        </div>
        <div class="form-group">
            <label for="numero_compte">Account Number:</label>
            <input type="text" class="form-control" id="numero_compte" name="numero_compte" value="{{ $paymentMethod->numero_compte }}">
        </div>
        <div class="form-group">
            <label for="titulaire_methode_paiement">Holder Name:</label>
            <input type="text" class="form-control" id="titulaire_methode_paiement" name="titulaire_methode_paiement" value="{{ $paymentMethod->titulaire_methode_paiement }}">
        </div>
        <div class="form-group">
            <label for="date_expiration">Expiration Date:</label>
            <input type="text" class="form-control" id="date_expiration" name="date_expiration" value="{{ $paymentMethod->date_expiration }}">
        </div>
        <div class="form-group">
            <label for="adresse_facturation">Billing Address:</label>
            <input type="text" class="form-control" id="adresse_facturation" name="adresse_facturation" value="{{ $paymentMethod->adresse_facturation }}">
        </div>
        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
