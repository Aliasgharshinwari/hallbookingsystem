<?php
namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Customer;
use App\Models\HallOwner;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
//        $halls = Hall::with('hall_owner','customer')->get();
        $halls = Hall::all();
        return view('halls.index', ['halls' => $halls]);
    }

    public function create()
    {
        $customers = Customer::all();
        $hall_owners = HallOwner::all();
        return view('halls.create', compact('customers','hall_owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'location' => 'nullable|string',
            'owner_id' => 'nullable|integer',
            'booking_price' => 'nullable|integer',
            'capacity' => 'nullable|integer',
            'is_available' => 'nullable|boolean',
            'hall_type' => 'nullable|string',
        ]);
  
        Hall::create($request->all());
        return redirect()->route('halls.index')->with('success', 'Hall created successfully.');
    }

    public function show(Hall $hall)
    {
        return view('halls.show', compact('hall'));
    }
    
    public function edit(Hall $hall)
    {
        
        $hall_owners = HallOwner::all();
        return view('halls.edit', compact('hall','hall_owners'));
    }

    public function update(Request $request, Hall $hall)
    {
        $request->validate([
            'name' => 'required|max:50',
            'location' => 'nullable|string',
            'owner_id' => 'nullable|integer',
            'booking_price' => 'nullable|integer',
            'capacity' => 'nullable|integer',
            'is_available' => 'nullable|boolean',
            'hall_type' => 'nullable|string',
        ]);

        $hall->update($request->all());
        return redirect()->route('halls.index')->with('success', 'Hall updated successfully.');
    }

    public function destroy(Hall $hall)
    {
        $hall->delete();
        return redirect()->route('halls.index')->with('success', 'Hall deleted successfully.');
    }
}
