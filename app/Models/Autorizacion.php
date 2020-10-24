<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizacion extends Model
{
    use HasFactory;

    protected $table = 'autorizaciones';

    protected $fillable = [
        'estado',
        'secretaria_id',
        'reservacion_id',
    ];

    public function secretaria()
    {
        return $this->belongsTo(Secretaria::class);
    }

    public function reservacion()
    {
        return $this->belongsTo(Reservacion::class);
    }
}
