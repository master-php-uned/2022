<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    use HasFactory;

    // Atributos asignables de una vez
    protected $fillable = [
        'type',
    ];

    // Obtiene los usuarios a partir del tipo de usuario via Foreign key, se establece una relación 1:n entre tipo de usuario : usuarios
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
