<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Proyectos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Listado de Proyectos') }}
      </h2>
    </x-slot>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <a href="{{ route('proyectos.create') }}" class="btn btn-outline-primary btn-lg">Agregar Nuevo</a>  <br>
            <br>

            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>  
                    <th scope="col">Nombre</th>  
                    <th scope="col">Grupo</th>  
                    <th scope="col">Archivo</th>  
                    <th scope="col">Acciones</th>  
                  </tr>
                </thead>
                <tbody>
                  @foreach ($proyectos as $proyecto)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td class="text-primary">{{ $proyecto->nombre }}</td>  
                      <td>{{ $proyecto->titulo }}</td>
                      <td>
                        <a href="{{ $proyecto->archivo }}" download="{{ basename($proyecto->archivo) }}">
                          <img src="https://cdn.icon-icons.com/icons2/272/PNG/512/Downloads_29996.png" alt="Icono de descarga" style="width: 30px;">
                        </a>
                      </td>
                      <td>
                        <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-outline-primary">Editar</a>  
                        <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este proyecto?')">Eliminar</button>  
                        </form>
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
