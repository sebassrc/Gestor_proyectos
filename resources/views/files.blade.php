<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Archivos cargados') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" name="name" id="nombre" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="nombre" required autocomplete="disabled">
                </div>
                <div class="mb-4">
                    <label for="archivo" class="block text-gray-700 text-sm font-bold mb-2">Archivo:</label>
                    <input type="file" name="file" id="archivo" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                </div>
                <div class="flex justify-end">
                    <input type="submit" value="Guardar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                </div>
            </form>

            <h3>Archivos cargados</h3>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Miniatura</th>
                        <th>Archivo</th>
                        <th>Tamaño</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($files))
                    @foreach($files as $file)
                    <tr>
                        <td>@if(isset($file['pinture']))<img src="{{$file['pinture']}}">@endif</td>
                        <td><a href="{{$file['link']}}" target="_blank">{{$file['name']}}</a></td>
                        <td>{{$file['size']}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @include('footer')
</x-app-layout>
