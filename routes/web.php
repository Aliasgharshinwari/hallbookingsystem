<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HallOwnerController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MyBookingController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource("customers", CustomerController::class);
    Route::resource("invoices", InvoiceController::class);
    Route::resource("reviews", ReviewController::class);
    Route::resource("hall_owners", HallOwnerController::class);
    // other admin routes
});
Route::resource("halls", HallController::class);
Route::resource("bookings", BookingController::class);
Route::resource("mybookings", MyBookingController::class);
/*
Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::get('/customers/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::get('/customers/show/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
*/
require __DIR__.'/auth.php';
