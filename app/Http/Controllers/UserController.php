<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $proyectos = $user->proyectos;

        return view('users.index')->with('proyectos', $proyectos);
    }

    public function create()
    {
        return view('users.new');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $proyecto = $user->proyectos()->create([
            'nombre' => $request->nombre,
            'area' => $request->area,
            'estado' => $request->estado,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'archivo' => $request->archivo,
        ]);
    
        return redirect()->route('users.index')->with('flash_message', 'Project added successfully.');
    }

    public function edit($id)
    {
        $user = auth()->user();
        $proyecto = $user->proyectos()->findOrFail($id);

        return view('users.edit')->with('proyecto', $proyecto);
    }

   public function update(Request $request, $id)
{
    $user = auth()->user();
    $proyecto = $user->proyectos()->findOrFail($id);
    
    // Verifica si se ha enviado el archivo
    if ($request->hasFile('archivo')) {
        // Actualiza el archivo solo si se ha enviado uno nuevo
        $proyecto->archivo = $request->archivo;
    }

    // Actualiza otros campos si están presentes en la solicitud
    if ($request->has('nombre')) {
        $proyecto->nombre = $request->nombre;
    }
    if ($request->has('area')) {
        $proyecto->area = $request->area;
    }

    // Guarda el proyecto
    $proyecto->save();

    return redirect()->route('users.index')->with('flash_message', 'Proyecto actualizado exitosamente.');
}



    public function destroy($id)
    {
        $user = auth()->user();
        $proyecto = $user->proyectos()->findOrFail($id);

        $proyecto->delete();

        return redirect()->route('users.index')->with('flash_message', 'Project deleted successfully.');
    }
}