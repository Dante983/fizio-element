<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'description', 'amount', 'issue_date'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

