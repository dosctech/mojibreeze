<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['name','email', 'date', 'pet_name', 'pet_type', 'concern','veterinarian','appointment_time','user_status'];

}
