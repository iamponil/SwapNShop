@extends('layouts/contentNavbarLayout')

@section('title', 'Show Payment')

@section('content')
    <h1>Payment Details</h1>
    <p><strong>ID:</strong> {{ $payment->id }}</p>
    <p><strong>Amount:</strong> {{ $payment->montant }}</p>
    <p><strong>Date & Time:</strong> {{ $payment->date_heure_paiement }}</p>
    <p><strong>Status:</strong> {{ $payment->statut_paiement }}</p>
    <p><strong>User ID:</strong> {{ $payment->user_id }}</p>
    <p><strong>Commande ID:</strong> {{ $payment->commande_id }}</p>
    <!-- Display other payment details -->
    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back</a>
@endsection
