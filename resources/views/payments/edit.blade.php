@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Payment')

@section('content')
    <h1>Edit Payment</h1>

    <form method="POST" action="{{ route('payments.update', $payment->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="montant">Amount:</label>
            <input type="text" class="form-control" id="montant" name="montant" value="{{ $payment->montant }}">
        </div>
        <!-- Add other fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
