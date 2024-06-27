<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Hall extends Model
{
    use HasFactory;

    protected $table = 'hall';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name', 
        'location', 
        'owner_id',
        'booking_price',
        'capacity',
        'hall_type' ,
    ];
    protected $casts = [
        'is_available' => 'boolean',
    ];
    public function booking(){
        return $this->hasOne(Booking::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function hall_owner(){
        return $this->belongsTo(HallOwner::class);
    }
}
