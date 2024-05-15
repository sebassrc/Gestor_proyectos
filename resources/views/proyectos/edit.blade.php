<x-app-layout>
    <x-slot name="header">
        <img src="https://cdn1.iconfinder.com/data/icons/hawcons/32/698873-icon-136-document-edit-512.png" alt="editar" class="h-30 w-10 fill-current text-gray-800 dark:text-gray-200 mr-4" />
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar proyecto') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-md">
            <div class="p-6">
                <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <input id="nombre" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" name="nombre" value="{{ $proyecto->nombre }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label for="area" class="block text-gray-700 text-sm font-bold mb-2">Área:</label>
                        <input id="area" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" name="area" value="{{ $proyecto->area }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                        <select id="estado" class="form-select rounded-md shadow-sm mt-1 block w-full" name="estado">
                            <option value="iniciación" {{ $proyecto->estado === 'iniciación' ? 'selected' : '' }}>Iniciación</option>
                            <option value="detenido" {{ $proyecto->estado === 'detenido' ? 'selected' : '' }}>Detenido</option>
                            <option value="en-progreso" {{ $proyecto->estado === 'en-progreso' ? 'selected' : '' }}>En progreso</option>
                            <option value="completado" {{ $proyecto->estado === 'completado' ? 'selected' : '' }}>Completado</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="fecha_inicio" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Inicio:</label>
                        <input id="fecha_inicio" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" name="fecha_inicio" value="{{ $proyecto->fecha_inicio }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label for="fecha_final" class="block text-gray-700 text-sm font-bold mb-2">Fecha Final:</label>
                        <input id="fecha_final" type="date" class="form-input rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" name="fecha_final" value="{{ $proyecto->fecha_final }}">
                    </div>

                    <div class="flex justify-center mt-4">
                        <a href="{{ route('proyectos.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center appearance-none mr-2">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center appearance-none">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
