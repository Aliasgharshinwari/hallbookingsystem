<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class HallOwner extends Model
{
    use HasFactory;

    protected $table = 'hall_owner';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name', 
        'phone_No', 
        'address'
    ];

    public function hall(){
        return $this->hasOne(Hall::class);
    }
}
