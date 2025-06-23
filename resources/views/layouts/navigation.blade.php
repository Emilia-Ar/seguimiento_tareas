<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800">Seguimiento Escolar</a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('dashboard') }}" class="border-b-2 border-transparent hover:border-blue-500 px-1 pt-1 text-sm font-medium text-gray-700">Dashboard</a>
                    <a href="{{ route('proyectos.index') }}" class="border-b-2 border-transparent hover:border-blue-500 px-1 pt-1 text-sm font-medium text-gray-700">Proyectos</a>
                    <a href="{{ route('tareas.index') }}" class="border-b-2 border-transparent hover:border-blue-500 px-1 pt-1 text-sm font-medium text-gray-700">Tareas</a>
                    <a href="{{ route('perfil') }}" class="border-b-2 border-transparent hover:border-blue-500 px-1 pt-1 text-sm font-medium text-gray-700">Desarrolladores</a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-700">
                            {{ Auth::user()->name }}
                            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Perfil</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar Sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <span class="sr-only">Abrir menú</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div :class="{'block': open, 'hidden': !open}" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-blue-500 text-base font-medium text-gray-700">Dashboard</a>
            <a href="{{ route('proyectos.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-blue-500 text-base font-medium text-gray-700">Proyectos</a>
            <a href="{{ route('tareas.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-blue-500 text-base font-medium text-gray-700">Tareas</a>
            <a href="{{ route('perfil') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-blue-500 text-base font-medium text-gray-700">Desarrolladores</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100" onclick="event.preventDefault(); this.closest('form').submit();">
                        Cerrar Sesión
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>