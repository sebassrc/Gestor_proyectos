<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de usuarios</title>
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
    <img src="https://vectorified.com/images/people-icon-blue-22.png" 
     alt="usuarios" class="block h-30 w-10 fill-current text-gray-800 dark:text-gray-200" style="margin-right: 5px;"> 
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Listado de usuarios') }}
      </h2>
    </x-slot>

    <div class="container mt-5">
      <!-- Controles de filtro -->
      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="filtro-estado" class="form-label">Filtrar por area:</label>
          <select id="filtro-estado" class="form-select">
            <option value="Seleccione área de estudio"></option>
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
                <!-- <a href="{{ route('proyectos.create') }}" class="btn btn-outline-primary btn-lg">Agregar Nuevo</a> <br> -->
                <br>
                <div class="table-responsive">
                  <table id="tabla-proyectos" class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Área</th>
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