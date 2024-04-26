<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Proyecto') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $proyecto->nombre }}" />
                </div>
                <div class="mb-4">
                    <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                    <input type="text" name="titulo" id="titulo" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $proyecto->titulo }}" />
                </div>
                <div class="mb-4">
                    <label for="archivo" class="block text-gray-700 text-sm font-bold mb-2">Archivo:</label>
                    <input type="file" name="archivo" id="archivo" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    <p class="text-xs text-gray-600 mt-1">Si deseas cambiar el archivo, selecciona uno nuevo. De lo contrario, deja este campo vacío.</p>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
    @include('footer')
</x-app-layout>
