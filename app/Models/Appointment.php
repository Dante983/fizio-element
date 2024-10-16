<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'appointment_time', 'notes'];

    // Relationship with Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
