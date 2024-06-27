<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Review;
use App\Models\Hall;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('customer','hall')->get();

        return view('reviews.index', ['reviews' => $reviews]);
    }

    public function create()
    {
        $customers = Customer::all();
        $halls = Hall::all();
        return view('reviews.create', compact('customers', 'halls'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customer,id',
            'hall_id' => 'required|exists:customer,id',
            'title' => 'nullable|string',
            'body' => 'nullable|string',
        ]);
    
        Review::create($request->all());
        return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
    }
    

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }
}
