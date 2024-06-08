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
        'phone_number',
        'graduate_year',
        'email',
        'password',
        'certification',
        'photo',
        'consultation_price',
        'reservation_price',
        'is_accepted',
        'str_number'
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


    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
