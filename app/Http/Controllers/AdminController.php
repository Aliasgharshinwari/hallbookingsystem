<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;


use App\Models\Hall;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $availableHalls = Hall::where('is_available', true)->get();

        return view('admin.dashboard', compact('availableHalls'));
    }
}

