<?php

use App\Http\Controllers\FilesController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [FilesController::class,'loadView'])->name('files.index');
    Route::post('/', [FilesController::class,'storeFile']);
    Route::get('/descargar/{name}',[FilesController::class,'downloadFile'])->name( 'download'); 

    // Rutas proyectos
    Route::prefix('proyectos')->group(function () {
        Route::get('/', [ProyectoController::class, 'index'])->name('proyectos.index');
        Route::get('/create', [ProyectoController::class, 'create'])->name('proyectos.create');
        Route::post('/', [ProyectoController::class, 'store'])->name('proyectos.store');
        Route::get('/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('proyectos.edit');
        Route::put('/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');
        Route::delete('/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');
    
        Route::get('/files', [ProyectoController::class, 'loadView'])->name('proyectos.files.index');
        Route::post('/files', [ProyectoController::class, 'storeFile'])->name('proyectos.files.store');
        Route::get('/files/{name}', [ProyectoController::class, 'downloadFile'])->name('proyectos.files.download');
    });
});

require __DIR__.'/auth.php';

