<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = ['nombre', 'correo'];

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class);
    }
}