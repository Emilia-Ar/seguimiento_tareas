<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Bienvenido, {{ auth()->user()->name }}</h3>
                <p>Resumen de tus proyectos y tareas.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div class="bg-blue-100 p-4 rounded">
                        <h4 class="font-bold">Proyectos Activos</h4>
                        <p>{{ $proyectosCount }}</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded">
                        <h4 class="font-bold">Tareas Pendientes</h4>
                        <p>{{ $tareasPendientesCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>