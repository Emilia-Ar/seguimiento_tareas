<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'estado', 'proyecto_id'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
