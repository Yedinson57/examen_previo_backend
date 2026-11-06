<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    // Relacion Muchos a Muchos
    public function modulos(){
        return $this->hasMany('App\Models\Modulo');
    }

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'cedula'
    ];
}
