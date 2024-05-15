<x-app-layout>
    <x-slot name="header">
        <img src="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_1280.png" alt="subir" class="block h-30 w-10 fill-current text-gray-800 dark:text-gray-200" style="margin-right: 5px;">
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
                        <input type="text" name="nombre" id="nombre" class="form-input rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" required autocomplete="nombre" />
                    </div>
                    <div class="mb-4">
                        <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                        <select name="estado" id="estado" class="form-select rounded-md shadow-sm mt-1 block w-full" required autocomplete="estado">
                            <option value="">Seleccione estado</option>
                            <option value="iniciación">Iniciación</option>
                            <option value="detenido">Detenido</option>
                            <option value="en-progreso">En progreso</option>
                            <option value="completado">Completado</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="fecha_inicio" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Inicio:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-input rounded-md shadow-sm mt-1 block w-full" required autocomplete="fecha_inicio" />
                    </div>
                    <div class="mb-4">
                        <label for="fecha_final" class="block text-gray-700 text-sm font-bold mb-2">Fecha Final:</label>
                        <input type="date" name="fecha_final" id="fecha_final" class="form-input rounded-md shadow-sm mt-1 block w-full" required autocomplete="fecha_final" />
                    </div>
                    <div class="mb-4">
                        <label for="area" class="block text-gray-700 text-sm font-bold mb-2">Área:</label>
                        <select name="area" id="area" class="form-select rounded-md shadow-sm mt-1 block w-full" required autocomplete="area">
                        <option value="">Seleccione área de estudio</option>
              <option value="Administración de Empresas con énfasis en Negocios Internacionales">Administrador de proyectos</option>
              <option value="Administración de Empresas con énfasis en Negocios Internacionales">Administración de Empresas con énfasis en Negocios Internacionales</option>
              <option value="Economía y Negocios Internacionales">Economía y Negocios Internacionales</option>
              <option value="Mercadeo Internacional y Publicidad">Mercadeo Internacional y Publicidad</option>
              <option value="Finanzas">Finanzas</option>
              <option value="Diseño de Medios Interactivos">Diseño de Medios Interactivos</option>
              <option value="Diseño Industrial">Diseño Industrial</option>
              <option value="Ingeniería de Energía Inteligente">Ingeniería de Energía Inteligente</option>
              <option value="Ingeniería Bioquímica">Ingeniería Bioquímica</option>
              <option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option>
              <option value="Ingeniería Industrial">Ingeniería Industrial</option>
              <option value="Ingeniería Telemática">Ingeniería Telemática</option>
              <option value="Biología con Concentraciones en Conservación y Biología Molecular/Biotecnología">Biología con Concentraciones en Conservación y Biología Molecular/Biotecnología</option>
              <option value="Química con Énfasis en Bioquímica">Química con Énfasis en Bioquímica</option>
              <option value="Química Farmacéutica">Química Farmacéutica</option>
              <option value="Antropología">Antropología</option>
              <option value="Ciencia Política con Énfasis en Relaciones Internacionales">Ciencia Política con Énfasis en Relaciones Internacionales</option>
              <option value="Derecho">Derecho</option>
              <option value="Psicología">Psicología</option>
              <option value="Música">Música</option>
              <option value="Sociología">Sociología</option>
              <option value="Comunicación">Comunicación</option>
              <option value="Licenciatura en Educación Básica Primaria">Licenciatura en Educación Básica Primaria</option>
              <option value="Licenciatura en Literatura y Lengua Castellana">Licenciatura en Literatura y Lengua Castellana</option>
              <option value="Licenciatura en Artes con énfasis en Tecnologías para la creación">Licenciatura en Artes con énfasis en Tecnologías para la creación</option>
              <option value="Licenciatura en Lenguas Extranjeras con énfasis en Inglés">Licenciatura en Lenguas Extranjeras con énfasis en Inglés</option>
              <option value="Licenciatura en Ciencias Sociales">Licenciatura en Ciencias Sociales</option>
              <option value="Medicina">Medicina</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="archivo" class="block text-gray-700 text-sm font-bold mb-2">Archivo:</label>
                        <input type="file" name="archivo" id="archivo" class="form-input rounded-md shadow-sm mt-1 block w-full focus:ring-indigo-500 focus:border-indigo-500" required autocomplete="off" />
                    </div>
                    <div class="flex justify-center mt-4">
                    <a href="{{ route('users.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center appearance-none mr-2">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center appearance-none">
                            Subir proyecto
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>