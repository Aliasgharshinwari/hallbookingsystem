<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Booking;
use App\Models\Customer;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'payment_paid', 
        'date_paid',
        'booking_id' 
    ];
    public function booking(){
        return $this->belongsTo(Booking::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}