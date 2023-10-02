@extends('layouts/contentNavbarLayout')

@section('title', 'Payment Methods')

@section('content')
    <h1>Payment Methods</h1>
    <a href="{{ route('payment_methods.create') }}" class="btn btn-primary">Create Payment Method</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Payment Type</th>
                <th>Account Number</th>
                <th>Holder Name</th>
                <th>Expiration Date</th>
                <th>Billing Address</th>
                <th>User ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paymentMethods as $paymentMethod)
                <tr>
                    <td>{{ $paymentMethod->id }}</td>
                    <td>{{ $paymentMethod->type_methode_paiement }}</td>
                    <td>{{ $paymentMethod->numero_compte }}</td>
                    <td>{{ $paymentMethod->titulaire_methode_paiement }}</td>
                    <td>{{ $paymentMethod->date_expiration }}</td>
                    <td>{{ $paymentMethod->adresse_facturation }}</td>
                    <td>{{ $paymentMethod->user_id }}</td>
                    <td>
                        <a href="{{ route('payment_methods.show', $paymentMethod->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('payment_methods.edit', $paymentMethod->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('payment_methods.destroy', $paymentMethod->id) }}" method="POST" style="display: inline;">
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
