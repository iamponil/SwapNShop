@extends('layouts/contentNavbarLayout')

@section('title', 'Show Payment Method')

@section('content')
    <h1>Payment Method Details</h1>
    <p><strong>ID:</strong> {{ $paymentMethod->id }}</p>
    <p><strong>Payment Type:</strong> {{ $paymentMethod->type_methode_paiement }}</p>
    <p><strong>Account Number:</strong> {{ $paymentMethod->numero_compte }}</p>
    <p><strong>Holder Name:</strong> {{ $paymentMethod->titulaire_methode_paiement }}</p>
    <p><strong>Expiration Date:</strong> {{ $paymentMethod->date_expiration }}</p>
    <p><strong>Billing Address:</strong> {{ $paymentMethod->adresse_facturation }}</p>
    <p><strong>User ID:</strong> {{ $paymentMethod->user_id }}</p>
    <!-- Display other payment method details -->
    <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary">Back</a>
@endsection
