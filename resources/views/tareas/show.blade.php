<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detalle de Tarea') }}
            </h2>
            <div>
                @can('update', $tarea)
                    <a href="{{ route('tareas.edit', $tarea) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Editar
                    </a>
                @endcan
                <a href="{{ route('tareas.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Volver al Listado
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Nombre</h3>
                            <p class="text-gray-700 dark:text-gray-300">{{ $tarea->nombre }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Fecha de Entrega</h3>
                            <p class="text-gray-700 dark:text-gray-300">{{ $tarea->fecha_entrega->format('d/m/Y') }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Descripción</h3>
                            <p class="text-gray-700 dark:text-gray-300">{{ $tarea->descripcion }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Usuario</h3>
                            <p class="text-gray-700 dark:text-gray-300">{{ $tarea->user->name }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Creado</h3>
                            <p class="text-gray-700 dark:text-gray-300">{{ $tarea->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    @can('delete', $tarea)
                        <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Acciones de Administración</h3>
                            <form method="POST" action="{{ route('tareas.destroy', $tarea) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')">
                                    Eliminar Tarea
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
