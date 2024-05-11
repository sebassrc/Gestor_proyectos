<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Proyectos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <!-- Scripts JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Función para filtrar las filas de la tabla según el estado seleccionado
      $('#filtro-estado').change(function() {
        var estado = $(this).val();
        if (estado === 'todos') {
          $('#tabla-proyectos tbody tr').show();
        } else {
          $('#tabla-proyectos tbody tr').hide();
          $('#tabla-proyectos tbody tr.' + estado).show();
        }
      });

      // Función para buscar en la tabla por nombre
      $('#search-input').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#tabla-proyectos tbody tr').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

</head>

<body>
  <x-app-layout>
    <x-slot name="header">
      <img src="https://www.freeiconspng.com/uploads/checklist-icon-blue-blue-checklist-document-19.png"
       alt="lista" class="block h-30 w-10 fill-current text-gray-800 dark:text-gray-200" style="margin-right: 5px;">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Listado de Proyectos') }}
      </h2>
   </x-slot>


    <div class="container mt-5">
      <!-- Controles de filtro -->
      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="filtro-estado" class="form-label">Filtrar por estado:</label>
          <select id="filtro-estado" class="form-select">
            <option value="todos">Todos</option>
            <option value="iniciación">Iniciación</option>
            <option value="detenido">Detenido</option>
            <option value="en-progreso">En progreso</option>
            <option value="completado">Completado</option>
          </select>
        </div>
        <div class="col-md-8 mb- position-relative">
          <label for="search-input" class="form-label">Buscar:</label>
          <div class="input-group">
            <input type="text" id="search-input" class="form-control" placeholder="Buscar proyectos">
            <span class="input-group-text">
              <img src="http://www.mendoza.edu.ar/wp-content/uploads/2017/11/lupa-buscar-icono-1024x1024.png" alt="lupa" class="block h-30 w-10 fill-current text-gray-800 dark:text-gray-200" style="width: 20px;">
            </span>
          </div>
        </div>
        <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <!-- <a href="{{ route('proyectos.create') }}" class="btn btn-outline-primary btn-lg">Subir un proyecto</a> <br> -->
                <br>
                <div class="table-responsive">
                  <table id="tabla-proyectos" class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Área</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de Inicio</th>
                        <th scope="col">Fecha Final</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($proyectos as $proyecto)
                      <tr class="{{ strtolower($proyecto->estado) }}">
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-primary">{{ $proyecto->nombre }}</td>
                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                          {{ $proyecto->area }}
                        </td>
                        <td>{{ $proyecto->estado }}</td>
                        <td>{{ $proyecto->fecha_inicio }}</td>
                        <td>{{ $proyecto->fecha_final }}</td>
                        <td>
                          <a href="{{ $proyecto->archivo }}" download="{{ basename($proyecto->archivo) }}">
                            <img src="https://cdn.icon-icons.com/icons2/272/PNG/512/Downloads_29996.png" alt="Icono de descarga" style="width: 40px;">
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-outline-primary">Editar</a>
                        <td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('footer')
  </x-app-layout>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>