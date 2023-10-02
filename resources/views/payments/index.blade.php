@extends('layouts/contentNavbarLayout')

@section('title', 'Payments')

@section('content')
    <h1>Payments</h1>
    <a href="{{ route('payments.create') }}" class="btn btn-primary">Create Payment</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Date & Time</th>
                <th>Status</th>
                <th>User ID</th>
                <th>Commande ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->montant }}</td>
                    <td>{{ $payment->date_heure_paiement }}</td>
                    <td>{{ $payment->statut_paiement }}</td>
                    <td>{{ $payment->user_id }}</td>
                    <td>{{ $payment->commande_id }}</td>
                    <td>
                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
