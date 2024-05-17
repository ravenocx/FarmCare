<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Veterinarian extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'specialist',
        'university',
        'graduate_year',
        'email',
        'password',
        'certification',
        'photo',
        'consultation_price',
        'reservation_price',
    ];

    protected $hidden = [
        'password',
    ];

    protected $guard=[
        'is_accepted'
    ];

    public function serviceSchedules(){
        return $this->hasMany('App\Models\ServiceSchedule', 'veterinarian_id', 'id');
    }

    // public function getVetWithServiceSchedules(){
    //     return Veterinarian::withCount('serviceSchedules')
    //     ->orderBy('service_schedules_count > 0 DESC')
    //     ->withC(['serviceSchedules'=> function($query){
    //         $query->where('is_reserved', false)
    //             ->orderBy('schedule_start', 'ASC');
    //     }])->get();
    // }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
