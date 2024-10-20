<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'appointment_time', 'notes', 'patient_id'];

    // Relationship with Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
