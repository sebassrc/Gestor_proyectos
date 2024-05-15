<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    private $disk = "public";

    public function usuarios()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.usuarios', compact('proyectos'));
    }

    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }
    

    public function create()
    {
        return view('proyectos.new');
    }

    public function store(Request $request)
    {
        $user = auth()->user(); // Obtener el usuario actualmente autenticado
        $proyecto = new Proyecto();
        
        // Asignar los valores del proyecto
        $proyecto->nombre = $request->nombre;
        $proyecto->area = $request->area;
        $proyecto->estado = $request->estado;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_final = $request->fecha_final;
        
        // Subir el archivo y obtener su ruta en el almacenamiento
        $path = $request->file('archivo')->store('files', $this->disk);
        $proyecto->archivo = '/storage/' . $path;

        // Asignar el usuario al proyecto
        $proyecto->user_id = $user->id;

        // Guardar el proyecto en la base de datos
        $proyecto->save();

        // Redirigir al usuario al índice de proyectos con un mensaje de éxito
        return redirect()->route('users.index')->with('flash_message', 'Project added successfully.');
    }
    
    
    
    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit')->with('proyecto', $proyecto);
    }

    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->estado = $request->estado;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_final = $request->fecha_final;

        $proyecto->save();
        return redirect()->route('proyectos.index')->with('flash_message', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        Storage::disk('public')->delete(str_replace('/storage/', '', $proyecto->archivo));
        $proyecto->delete();
        return redirect()->route('users.index')->with('flash_message', 'Project deleted successfully.');
    }




    
    public function loadView()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index')->with('proyectos', $proyectos);
    }

    public function storeFile(Request $req)
    {
        if ($req->isMethod('POST')) {
            $fileName = uniqid() . '_' . $req->file('file')->getClientOriginalName();
            $path = $req->file('file')->storeAs('files', $fileName, $this->disk);
            
            // Aquí podrías asociar el archivo al proyecto si es necesario
            // Ejemplo: $proyecto->archivo = '/storage/' . $path;
        }
        return $this->loadView();
    }

    public function downloadFile($id)
    {
        $proyecto = Proyecto::findOrFail($id);
    
        // Obtener el nombre del archivo almacenado en el campo 'archivo' del proyecto
        $archivoPath = $proyecto->archivo;
    
        // Verificar si el archivo existe en el sistema de archivos
        if (Storage::disk($this->disk)->exists($archivoPath)) {
            // Descargar el archivo
            return Storage::disk($this->disk)->download(str_replace('/storage/', '', $archivoPath), $proyecto->nombre);
        }
    
        // Si el archivo no existe, retornar una respuesta HTTP 404 (No encontrado)
        return response('', 404);
    }

}