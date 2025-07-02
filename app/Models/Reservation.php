<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'reservation_date',
        'number_of_people',
        'special_request',
        'status',
    ];

    protected $casts = [
        'reservation_date' => 'datetime',
        'number_of_people' => 'integer',
    ];
} 