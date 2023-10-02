<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    // Display a list of payment methods
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('payment_methods.index', compact('paymentMethods'));
    }

    // Show the form for creating a new payment method
    public function create()
    {
        return view('payment_methods.create');
    }

    // Store a newly created payment method in the database
    public function store(Request $request)
    {
        // Validate the request data here as needed

        $paymentMethod = new PaymentMethod($request->all());
        $paymentMethod->save();

        return redirect()->route('payment_methods.index')->with('success', 'Payment method created successfully.');
    }

    // Display the specified payment method
    public function show($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        return view('payment_methods.show', compact('paymentMethod'));
    }

    // Show the form for editing the specified payment method
    public function edit($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        return view('payment_methods.edit', compact('paymentMethod'));
    }

    // Update the specified payment method in the database
    public function update(Request $request, $id)
    {
        // Validate the request data here as needed

        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->update($request->all());

        return redirect()->route('payment_methods.index')->with('success', 'Payment method updated successfully.');
    }

    // Remove the specified payment method from the database
    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->delete();

        return redirect()->route('payment_methods.index')->with('success', 'Payment method deleted successfully.');
    }
}
