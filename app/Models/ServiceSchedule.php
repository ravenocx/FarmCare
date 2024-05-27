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
        'service_category',
        'is_reserved',
    ];

    protected $casts = [
        'is_reserved'=> 'boolean'
    ];

    public function veterinarian(){
        return $this->hasOne('App\Models\Veterinarian', 'id', 'veterinarian_id');
    }
}
