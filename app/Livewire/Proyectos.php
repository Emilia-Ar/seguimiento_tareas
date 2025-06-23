<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Auth;

class Proyectos extends Component
{
    public $nombre, $fecha_entrega, $descripcion;

    public function save()
    {
        $validated = $this->validate([
            'nombre' => 'required|string|max:255',
            'fecha_entrega' => 'required|date',
            'descripcion' => 'nullable|string',
        ]);

        Proyecto::create([
            'nombre' => $validated['nombre'],
            'fecha_entrega' => $validated['fecha_entrega'],
            'descripcion' => $validated['descripcion'],
            'user_id' => Auth::id(),
        ]);

        $this->reset(['nombre', 'fecha_entrega', 'descripcion']);
        session()->flash('message', 'Proyecto creado exitosamente.');
    }

    public function render()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $proyectos = Auth::user()->proyectos;
        return view('livewire.proyectos', compact('proyectos'));
    }
}
