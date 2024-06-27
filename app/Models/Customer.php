<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name', 
        'no_of_halls_booked', 
        'phone_No', 
        'address'
    ];
    
    
        public function reviews(){
            return $this->hasMany(Review::class);
        }
    
        public function bookings(){
            return $this->hasMany(Booking::class);
        }
}
