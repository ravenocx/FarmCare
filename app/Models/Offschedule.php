<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offschedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'veterinarian_id',
        'specialist',
        'date',
        'session',
        'reservation_price',
        'status'
    ];

    

    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }
}