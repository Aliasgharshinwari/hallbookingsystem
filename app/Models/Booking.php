<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'booking_start_time', 
        'booking_end_time', 
        'customer_id',
        'hall_id',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function hall(){
        return $this->belongsTo(Hall::class);
    }

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }


}
