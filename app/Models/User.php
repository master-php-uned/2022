<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    // Atributos asignables de una vez
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Atributos que deben ocultarse para la serialización
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Atributos que deben emitirse
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
