<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Subir Proyecto') }}
    </h2>
  </x-slot>

  <div class="container mx-auto py-6">
    <div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-md">
      <div class="p-6">
        <form action="{{ route('proyectos.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-4">
            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-input rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" />
          </div>
          <div class="mb-4">
            <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-input rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" />
          </div>
          <div class="mb-4">
            <label for="archivo" class="block text-gray-700 text-sm font-bold mb-2">Archivo:</label>
            <input type="file" name="archivo" id="archivo" class="form-input rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" />
          </div>
          <div class="flex justify-center mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center appearance-none">
              Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
