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
        'is_accepted',
        'consultation_price',
        'reservation_price',
    ];

    protected $hidden = [
        'password',
    ];

    protected $guard=[
        'is_accepted'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
