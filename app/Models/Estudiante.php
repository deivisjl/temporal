<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreEs',
        'carrera',
        'carnet',
        'correo'

    ];

    public function reservaciones()
    {
       return $this->hasMany(Reservacion::class);
    }
}
