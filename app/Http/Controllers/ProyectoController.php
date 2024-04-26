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
        $validated = $request->validate([
            'archivo' => ['required', 'file', 'mimes:pdf,doc,docx'], // Añade validaciones adicionales si es necesario
        ]);
    
        $fileName = $request->file('archivo')->getClientOriginalName();
        $path = $request->file('archivo')->storeAs('images', $fileName, 'public');
        $requestData = $request->all();
        $requestData['archivo'] = '/storage/' . $path;
    
        Proyecto::create($requestData);
    
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
        $requestData = $request->all();
        $proyecto = Proyecto::findOrFail($id);
        
        // Verificar si se proporcionó un archivo en la solicitud
        if ($request->hasFile('archivo')) {
            // Procesar el archivo y actualizar el campo 'archivo'
            $fileName = time() . $request->file('archivo')->getClientOriginalName();
            $path = $request->file('archivo')->storeAs('images', $fileName, 'public');
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
        $proyecto->delete();
        return redirect('proyectos')->with('flash_message', 'Proyecto Deleted!');
    }

    /**
     * Download the specified file.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $fileContents = Storage::get($proyecto->archivo);
  
        // Set appropriate headers for download
        $response = response($fileContents);
        $response->header('Content-Type', Storage::mimeType($proyecto->archivo));
        $response->header('Content-Disposition', "attachment;filename=" . $proyecto->nombre);
  
        return $response;
    }
}
