<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;
    protected $fillable = [
        'veterinarian_id',
        'medicine',
        'quantity',
        'price',
        'address',
        'order_status'
    ];
}
