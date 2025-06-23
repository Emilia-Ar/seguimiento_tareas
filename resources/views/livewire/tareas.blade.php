<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold mb-4">Gestión de Tareas</h2>
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">{{ session('message') }}</div>
    @endif
    <button wire:click="create" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600">Nueva Tarea</button>

    <!-- Modal -->
    @if ($isOpen)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg w-full max-w-md">
                <h3 class="text-lg font-bold mb-4">{{ $tarea_id ? 'Editar Tarea' : 'Nueva Tarea' }}</h3>
                <form wire:submit.prevent="{{ $tarea_id ? 'update' : 'store' }}">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" wire:model="titulo" class="w-full border rounded p-2">
                        @error('titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea wire:model="descripcion" class="w-full border rounded p-2"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Estado</label>
                        <select wire:model="estado" class="w-full border rounded p-2">
                            <option value="pendiente">Pendiente</option>
                            <option value="en_progreso">En Progreso</option>
                            <option value="completada">Completada</option>
                        </select>
                        @error('estado') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Proyecto</label>
                        <select wire:model="proyecto_id" class="w-full border rounded p-2">
                            @foreach ($proyectos as $proyecto)
                                <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                            @endforeach
                        </select>
                        @error('proyecto_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="button" wire:click="$set('isOpen', false)" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">Cancelar</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">{{ $tarea_id ? 'Actualizar' : 'Crear' }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <!-- Tabla -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Título</th>
                    <th class="border p-2">Proyecto</th>
                    <th class="border p-2">Estado</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                    <tr>
                        <td class="border p-2">{{ $tarea->titulo }}</td>
                        <td class="border p-2">{{ $tarea->proyecto->nombre }}</td>
                        <td class="border p-2">{{ ucfirst($tarea->estado) }}</td>
                        <td class="border p-2">
                            <button wire:click="edit({{ $tarea->id }})" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Editar</button>
                            <button wire:click="delete({{ $tarea->id }})" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>