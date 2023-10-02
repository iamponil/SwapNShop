<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Display a list of payments
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    // Show the form for creating a new payment
    public function create()
    {
        $paymentMethods = PaymentMethod::all();
        return view('payments.create', compact('paymentMethods'));
    }

    // Store a newly created payment in the database
    public function store(Request $request)
{

    $payment = new Payment($request->all());
    $payment->save();

    return redirect()->route('payments.index')->with('success', 'Payment has been created successfully.');
}
    // Display the specified payment
    public function show($id)
    {
        $payment = Payment::find($id);
        return view('payments.show', compact('payment'));
    }

    // Show the form for editing the specified payment
    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('payments.edit', compact('payment'));
    }

    // Update the specified payment in the database
    public function update(Request $request, $id)
    {
        // Validate the request data here as needed

        $payment = Payment::find($id);
        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    // Remove the specified payment from the database
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
