<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hall;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class BookingController extends Controller
{
public function index()
{
   // $customers = Customer::all();
    //$halls = Hall::all();
    $bookings = Booking::with('invoice',)->get(); // Adjust the number as needed for pagination
    
    return view('bookings.index', compact('bookings'));
}

    public function create()
    {
        $customers = Customer::all();
        $halls = Hall::all();
        return view('bookings.create', compact('customers','halls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_start_time' => 'nullable|date',
            'booking_end_time' => 'nullable|date|after:booking_start_time', // Ensure end time is after start time
            'hall_id' => 'required|exists:hall,id', // Ensure the hall exists
        ]);
    
        $booking = new Booking();
        $booking->booking_start_time = $request->booking_start_time;
        $booking->booking_end_time = $request->booking_end_time;
        $booking->customer_id = auth()->id(); // Set the authenticated user's ID
        $booking->hall_id = $request->hall_id;
        $booking->save();
    

        // Update the hall's availability status
        $hall = Hall::findOrFail($request->hall_id);
        //dd($request->hall_id);
        $hall->is_available = false; // Set the boolean field to false (assuming you want to mark it as unavailable)
        //dd( $hall->is_available);
        $hall->save();

        // Create an invoice record
        $invoice = new Invoice();
        $invoice->date_paid = $booking->booking_start_time; // Assuming you have a 'booking_id' column in your 'invoices' table
        $invoice->booking_id = $booking->id; // Assuming you have a 'booking_id' column in your 'invoices' table
        $invoice->payment_paid = $hall->booking_price; // Replace with actual amount calculation logic
        $invoice->save();

        $customer = Customer::findOrFail(auth()->id());
        $customer->no_of_halls_booked++;
        $customer->save();
        
        return redirect()->route('dashboard')->with('success', 'Booking created successfully.');
    }
    

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'booking_start_time' => 'nullable|date',
            'booking_end_time' => 'nullable|date',
            'customer_id' => 'nullable|integer',
            'hall_id'=> 'nullable|integer',
        ]);

        $booking->update($request->all());
        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(Hall $hall)
    {
        $hall->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
