<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'date_of_birth'];

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
