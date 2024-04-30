<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index')->with('proyectos', $proyectos);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyectos.new');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'archivo' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:2048'], // Validaciones adicionales
        ]);
    
        $fileName = uniqid() . '_' . $request->file('archivo')->getClientOriginalName(); // Nombre único
        $path = $request->file('archivo')->storeAs('files', $fileName, 'public'); // Carpeta 'files'
    
        Proyecto::create([
            'nombre' => $request->nombre,
            'titulo' => $request->titulo,
            'archivo' => '/storage/' . $path,
        ]);
    
        return redirect('proyectos')->with('flash_message', 'Proyecto Added!');
    }
    
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit')->with('proyecto', $proyecto);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'archivo' => ['file', 'mimes:pdf,doc,docx', 'max:2048'], // Validaciones adicionales
        ]);

        $proyecto = Proyecto::findOrFail($id);
        $requestData = [
            'nombre' => $request->nombre,
            'titulo' => $request->titulo,
        ];

        // Verificar si se proporcionó un nuevo archivo
        if ($request->hasFile('archivo')) {
            // Eliminar el archivo antiguo
            Storage::disk('public')->delete(str_replace('/storage/', '', $proyecto->archivo));

            // Subir el nuevo archivo
            $fileName = uniqid() . '_' . $request->file('archivo')->getClientOriginalName();
            $path = $request->file('archivo')->storeAs('files', $fileName, 'public');
            $requestData['archivo'] = '/storage/' . $path;
        }
    
        // Actualizar los campos del proyecto
        $proyecto->update($requestData);
        
        return redirect('proyectos')->with('flash_message', 'Proyecto Updated!');
    }
    
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        Storage::disk('public')->delete(str_replace('/storage/', '', $proyecto->archivo)); // Eliminar el archivo
        $proyecto->delete();
        return redirect('proyectos')->with('flash_message', 'Proyecto Deleted!');
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  
}
