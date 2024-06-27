<?php
namespace App\Http\Controllers;

use App\Models\HallOwner;
use Database\Seeders\HallOwnerSeeder;
use Illuminate\Http\Request;

class HallOwnerController extends Controller
{
    public function index()
    {
        $hall_owners = HallOwner::with('hall')->get();
       // $hall_owners = HallOwner::all();
        return view('hall_owners.index', ['hall_owners'  => $hall_owners]);
    }

    public function create()
    {
        return view('hall_owners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'phone_No' => 'nullable|integer',
            'address' => 'nullable|max:30',
        ]);

        HallOwner::create($request->all());
        return redirect()->route('hall_owners.index')->with('success', 'Hall Owner created successfully.');
    }

    public function show(HallOwner $hall_owner)
    {
        return view('hall_owners.show', compact('hall_owner'));
    }

    public function edit(HallOwner $hall_owner)
    {
        return view('hall_owners.edit', compact('hall_owner'));
    }

    public function update(Request $request, HallOwner $hall_owner)
    {
        $request->validate([
            'name' => 'required|max:50',
            'phone_No' => 'nullable|integer',
            'address' => 'nullable|max:30',
        ]);

        $hall_owner->update($request->all());
        return redirect()->route('hall_owners.index')->with('success', 'Hall Owner updated successfully.');
    }

    public function destroy(HallOwner $hall_owner)
    {
        $hall_owner->delete();
        return redirect()->route('hall_owners.index')->with('success', 'Hall Owner deleted successfully.');
    }
}
