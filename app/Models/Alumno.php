<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    // Relacion uno a Muchos (inversa)
    public function modulo(){
        return $this->belongsTo('App\Models\Modulo');
    }

    protected $fillable = [
        'nombre',
        'apellidos',
        'fecha_nac',
        'expediente',
        'imagen_url',
        'imagen_public_id',
        'modulo_id',
    ];
}
