<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $proyectosCount = auth()->user()->proyectos->count();
        $proyectosIds = auth()->user()->proyectos->pluck('id')->toArray();
        $tareasPendientesCount = count($proyectosIds) > 0 
            ? Tarea::where('estado', 'pendiente')->whereIn('proyecto_id', $proyectosIds)->count() 
            : 0;

        return view('dashboard', compact('proyectosCount', 'tareasPendientesCount'));
    }
}