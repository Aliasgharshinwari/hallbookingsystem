<?php
namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch halls that are available
        $availableHalls = Hall::where('is_available', true)->get();

        // Pass the available halls to the view
        return view('dashboard', compact('availableHalls'));
    }

}
