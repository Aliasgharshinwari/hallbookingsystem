<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'hall_id',
        'title', 
        'body',
        'customer_id' 
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function hall(){
        return $this->belongsTo(Hall::class);
    }
}