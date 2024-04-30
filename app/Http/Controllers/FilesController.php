<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    private $disk = "public";

    public function loadView()
    {
        $files = [];
        foreach (Storage::disk($this->disk)->files() as $file) {
            $name = str_replace($this->disk . '/', '', $file);
            $picture = "";
            $type = Storage::disk($this->disk)->mimeType($name);

            if (strpos($type, "image") !== false) {
                $picture = asset(Storage::disk($this->disk)->url($name));
            }

            $downloadLink = route("download", $name);

            $files[] = [
                "picture" => $picture,
                "name" => $name,
                "link" => $downloadLink, // Cambiado de 'Link' a 'link'
                "size" => Storage::disk($this->disk)->size($name)
            ];
        }

        return view('files', ["files" => $files]);
    }

    public function storeFile(Request $req)
    {
        if ($req->isMethod('POST')) { // Corregido el nombre del método
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
