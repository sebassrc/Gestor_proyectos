<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    private $disk = "public";

    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index')->with('proyectos', $proyectos);
    }

    public function create()
    {
        return view('proyectos.new');
    }

    public function store(Request $request)
    {
        // Crear una nueva instancia del modelo Proyecto
        $proyecto = new Proyecto();
        
        // Asignar los valores del formulario a las propiedades del modelo
        $proyecto->nombre = $request->nombre;
        $proyecto->estado = $request->estado;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_final = $request->fecha_final;
        $proyecto->area = $request->area;
    
        // Establecer un nombre personalizado para el archivo
        $fileName = 'PROYECTO_' . uniqid() . '.' . $request->file('archivo')->getClientOriginalExtension();
    
        // Subir el archivo con el nombre personalizado
        $path = $request->file('archivo')->storeAs('files', $fileName, 'public');
        $proyecto->archivo = '/storage/' . $path;
    
        // Guardar el modelo en la base de datos
        $proyecto->save();
    
        // Redirigir al usuario al índice de proyectos con un mensaje de éxito
        return redirect()->route('proyectos.index')->with('flash_message', 'Proyecto agregado correctamente.');
    }
    
    


    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit')->with('proyecto', $proyecto);
    }

    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->nombre = $request->nombre;
        $proyecto->area = $request->area;
        $proyecto->estado = $request->estado;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_final = $request->fecha_final;

        if ($request->hasFile('archivo')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $proyecto->archivo));
            $fileName = uniqid() . '_' . $request->file('archivo')->getClientOriginalName();
            $path = $request->file('archivo')->storeAs('files', $fileName, 'public');
            $proyecto->archivo = '/storage/' . $path;
        }

        $proyecto->save();
        return redirect('proyectos');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        Storage::disk('public')->delete(str_replace('/storage/', '', $proyecto->archivo));
        $proyecto->delete();
        return redirect('proyectos');
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
            return Storage::disk($this->disk)->download(str_replace('/storage/', '', $archivoPath));
        }
    
        // Si el archivo no existe, retornar una respuesta HTTP 404 (No encontrado)
        return response('', 404);
    }
}

