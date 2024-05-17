<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'veterinarian_id',
        'schedule_start',
        'schedule_end',
        'service_category'
    ];

    protected $guard = [
        'is_reserved',
    ];

    public function Veterinarians(){
        return $this->hasOne('App\Models\Veterinarian', 'id', 'veterinarian_id');
    }
}
