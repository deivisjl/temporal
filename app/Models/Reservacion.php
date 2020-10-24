<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estudiante;
use App\Models\Libro;


class Reservacion extends Model
{
    use HasFactory;

    protected $table = 'reservaciones';

    protected $fillable = [
        'proceso',
        'libro_id',
        'estudiante_id',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

    public function autorizacion()
    {
       return $this->hasMany(Autorizacion::class);
    }
}
