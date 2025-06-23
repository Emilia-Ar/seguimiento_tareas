<div>
    <h2>Mis Proyectos</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save" class="mb-4">
        <div class="mb-3">
            <input type="text" wire:model="nombre" class="form-control" placeholder="Nombre del proyecto" required>
        </div>
        <div class="mb-3">
            <input type="date" wire:model="fecha_entrega" class="form-control" required>
        </div>
        <div class="mb-3">
            <textarea wire:model="descripcion" class="form-control" placeholder="Descripción (opcional)"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    @if ($proyectos->isNotEmpty())
        <ul>
            @foreach ($proyectos as $proyecto)
                <li>{{ $proyecto->nombre }} - Fecha de entrega: {{ $proyecto->fecha_entrega }}</li>
            @endforeach
        </ul>
    @else
        <p>No tienes proyectos asignados.</p>
    @endif
</div>