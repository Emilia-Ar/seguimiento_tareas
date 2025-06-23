<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'fecha_entrega', 'user_id'];

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
