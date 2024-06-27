<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Invoice;
use App\Models\Customer;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('booking')->get();
        return view('invoices.index', ['invoices' => $invoices]);
    }

    public function create()
    {
        $bookings = Booking::all();
        return view('invoices.create', compact('bookings'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|integer',
            'payment_paid' => 'nullable|integer',
            'date_paid' => 'nullable|date',
        ]);
    
        Invoice::create($request->all());
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }
    

    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
