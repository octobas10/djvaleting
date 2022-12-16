<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    //use HasFactory;


    protected $fillable = [
        'uniqid',
        'name',
        'contact_number',
        'email',
        'booking_date',
        'flexibility',
        'vehicle_size',
        'approval_status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
