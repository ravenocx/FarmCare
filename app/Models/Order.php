<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'veterinarian_id',
        'cust_name',
        'cust_address',
        'cust_phone_number',
        'veter_phone_number',
        'payment_proof',
        'appointment_date',
        'category',
        'service_category',
        'order_status',
        'order_date',
        'price',
        'schedule_id'
    ];

    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    
}
