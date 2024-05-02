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
        $request->validate([
            'archivo' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
        ]);
    
        $fileName = uniqid() . '_' . $request->file('archivo')->getClientOriginalName();
        $path = $request->file('archivo')->storeAs('files', $fileName, 'public');
    
        Proyecto::create([
            'nombre' => $request->nombre,
            'titulo' => $request->titulo,
            'archivo' => '/storage/' . $path,
        ]);
    
        return redirect('proyectos')->with('flash_message', 'Proyecto agregado correctamente.');
    }

    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit')->with('proyecto', $proyecto);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'archivo' => ['file', 'mimes:pdf,doc,docx', 'max:2048'],
        ]);

        $proyecto = Proyecto::findOrFail($id);
        $requestData = [
            'nombre' => $request->nombre,
            'titulo' => $request->titulo,
        ];

        if ($request->hasFile('archivo')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $proyecto->archivo));

            $fileName = uniqid() . '_' . $request->file('archivo')->getClientOriginalName();
            $path = $request->file('archivo')->storeAs('files', $fileName, 'public');
            $requestData['archivo'] = '/storage/' . $path;
        }
    
        $proyecto->update($requestData);
        
        return redirect('proyectos')->with('flash_message', 'Proyecto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        Storage::disk('public')->delete(str_replace('/storage/', '', $proyecto->archivo));
        $proyecto->delete();
        return redirect('proyectos')->with('flash_message', 'Proyecto eliminado correctamente.');
    }

    public function loadView()
    {
        $proyectos = [];
        foreach (Storage::disk($this->disk)->files() as $file) {
            $name = str_replace($this->disk . '/', '', $file);
            $picture = "";
            $type = Storage::disk($this->disk)->mimeType($name);

            if (strpos($type, "image") !== false) {
                $picture = asset(Storage::disk($this->disk)->url($name));
            }

            $downloadLink = route("proyectos.files.download", $name);

            $proyectos[] = [
                "picture" => $picture,
                "name" => $name,
                "link" => $downloadLink,
                "size" => Storage::disk($this->disk)->size($name)
            ];
        }

        return view('proyectos.index')->with('proyectos', $proyectos);
    }

    public function storeFile(Request $req)
    {
        if ($req->isMethod('POST')) {
            $file = $req->file('file');
            $name = $req->input('name');

            $file->storeAs('', $name . "." . $file->extension(), $this->disk);
        }
        return $this->loadView();
    }

    public function downloadFile($name)
    {
        if (Storage::disk($this->disk)->exists($name)) {
            return Storage::disk($this->disk)->download($name);
        }

        return response('', 404);
    }
}
