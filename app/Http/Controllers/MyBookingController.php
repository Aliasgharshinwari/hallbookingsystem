<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hall;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class MyBookingController extends Controller
{
public function index()
{
    $mybookings = Booking::with('invoice',)->get(); // Adjust the number as needed for pagination
    return view('mybookings.index', compact('mybookings'));
}

    public function show(Booking $mybooking)
    {
        return view('mybookings.show', compact('mybooking'));
    }

    public function edit(Booking $booking)
    {
        return view('mybookings.edit', compact('booking'));
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
        return redirect()->route('mybookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(Hall $hall)
    {
        $hall->delete();
        return redirect()->route('mybookings.index')->with('success', 'Booking deleted successfully.');
    }
}
