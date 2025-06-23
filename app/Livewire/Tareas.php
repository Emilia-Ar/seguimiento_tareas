<?php
namespace App\Livewire;
use App\Models\Tarea;
use App\Models\Proyecto;
use Livewire\Component;

class Tareas extends Component {
    public $titulo, $descripcion, $estado, $proyecto_id, $tarea_id;
    public $isOpen = false;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'estado' => 'required|in:pendiente,en_progreso,completada',
        'proyecto_id' => 'required|exists:proyectos,id',
    ];

    public function render() {
        $tareas = Tarea::with('proyecto')->whereHas('proyecto', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();
        $proyectos = Proyecto::where('user_id', auth()->id())->get();
        return view('livewire.tareas', compact('tareas', 'proyectos'));
    }

    public function create() {
        $this->resetInput();
        $this->isOpen = true;
    }

    public function store() {
        $this->validate();
        Tarea::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'proyecto_id' => $this->proyecto_id,
        ]);
        $this->isOpen = false;
        session()->flash('message', 'Tarea creada exitosamente.');
    }

    public function edit($id) {
        $tarea = Tarea::findOrFail($id);
        $this->tarea_id = $id;
        $this->titulo = $tarea->titulo;
        $this->descripcion = $tarea->descripcion;
        $this->estado = $tarea->estado;
        $this->proyecto_id = $tarea->proyecto_id;
        $this->isOpen = true;
    }

    public function update() {
        $this->validate();
        $tarea = Tarea::findOrFail($this->tarea_id);
        $tarea->update([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'proyecto_id' => $this->proyecto_id,
        ]);
        $this->isOpen = false;
        session()->flash('message', 'Tarea actualizada exitosamente.');
    }

    public function delete($id) {
        Tarea::findOrFail($id)->delete();
        session()->flash('message', 'Tarea eliminada exitosamente.');
    }

    private function resetInput() {
        $this->titulo = $this->descripcion = $this->estado = $this->proyecto_id = null;
        $this->tarea_id = null;
    }
}