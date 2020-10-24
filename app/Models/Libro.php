<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'editorial',
        'autor',
        'stock',
        'imagenLibro',
        'estado',
    ];

    public function reservaciones()
    {
       return $this->hasMany(Reservacion::class);
    }
}
