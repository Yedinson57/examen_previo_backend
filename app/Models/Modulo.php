<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    // Relacion Muchos a Muchos (inversa)
    public function profesors(){
        return $this->belongsToMany('App\Models\Profesor');
    }

    // Relacion Uno a Muchos
    public function alumnos(){
        return $this->hasMany('App\Models\Alumno');
    }

    protected $fillable = [
        'codigo',
        'nombre',
    ];
}
