<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_History extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'service',
        'status',
        'order_date'
    ];
}
