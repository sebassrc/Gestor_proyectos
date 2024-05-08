<?php

use App\Http\Controllers\UserController;
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

    // Rutas para perfil
    Route::get    ( '/profile', [ProfileController::class, 'edit'    ]) -> name( 'profile.edit'    );
    Route::patch  ( '/profile', [ProfileController::class, 'update'  ]) -> name( 'profile.update'  );
    Route::delete ( '/profile', [ProfileController::class, 'destroy' ]) -> name( 'profile.destroy' );

    // Rutas para usuarios
    Route::get    ('/users',             [ UserController::class, 'index'   ]) -> name ( 'users.index'   );
    Route::get    ('/users/create',      [ UserController::class, 'create'  ]) -> name ( 'users.create'  );
    Route::post   ('/users',             [ UserController::class, 'store'   ]) -> name ( 'users.store'   );
    Route::get    ('/users/{user}/edit', [ UserController::class, 'edit'    ]) -> name ( 'users.edit'    );
    Route::put    ('/users/{user}',      [ UserController::class, 'update'  ]) -> name ( 'users.update'  );
    Route::delete ('/users/{user}',      [ UserController::class, 'destroy' ]) -> name ( 'users.destroy' );
});

  // Rutas para proyectos
  Route::prefix ( 'proyectos' )->group(function () {
    Route::get    ( '/',                    [ ProyectoController::class, 'index'        ]) -> name ( 'proyectos.index'         );
    Route::get    ( '/create',              [ ProyectoController::class, 'create'       ]) -> name ( 'proyectos.create'        );
    Route::post   ( '/',                    [ ProyectoController::class, 'store'        ]) -> name ( 'proyectos.store'         );
    Route::get    ( '/{proyecto}/edit',     [ ProyectoController::class, 'edit'         ]) -> name ( 'proyectos.edit'          );
    Route::put    ( '/{proyecto}',          [ ProyectoController::class, 'update'       ]) -> name ( 'proyectos.update'        );
    Route::delete ( '/{proyecto}',          [ ProyectoController::class, 'destroy'      ]) -> name ( 'proyectos.destroy'       );
    Route::get    ( '/usuarios',            [ ProyectoController::class, 'usuarios'     ]) -> name ( 'proyectos.usuarios'      );
    Route::get    ( '/{proyecto}/download', [ ProyectoController::class, 'downloadFile' ]) -> name ( 'proyectos.files.download');
    });

require __DIR__.'/auth.php';
