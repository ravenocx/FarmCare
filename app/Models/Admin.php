<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $hidden = [
        'password',
    ];

    protected $fillable=[
        'name',
        'email'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
