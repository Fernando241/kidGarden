<?php

use App\Http\Controllers\administradorController;
use App\Http\Controllers\estudianteController;
use App\Http\Controllers\galeriaController;
use App\Http\Controllers\nivelesController;
use App\Http\Controllers\nosotrosController;
use App\Http\Controllers\noticiasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\solicitudController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* rutas a vistas de la pagina */

Route::get('/noticias', [noticiasController::class, 'noticias']);

Route::get('/nosotros', [nosotrosController::class, 'nosotros']);

Route::get('/galeria', [galeriaController::class, 'galeria']);

Route::get('/niveles', [nivelesController::class, 'niveles']);

Route::get('solicitud', [solicitudController::class, 'solicitud']);

/*  rutas para llamar los datos de la tabla estudiantes */

Route::get('/estudiantes', [estudianteController::class, 'index']) ->name('estudiantes.index');

Route::put('/estudiante/edit', [estudianteController::class, 'edit']) ->name('estudiante.edit'); //revisar esta ruta bien


//rutas prueba para estudiante

/* Route::resource('admin/estudiantes', estudianteController::class, 'index')->names('admin.Estudiantes'); */

//rutas para Administradores

Route::get('/administrador', [administradorController::class, 'index']) ->name('administrador.index');
//Route::put('/admin/estudiante/edit', [estudianteController::class, 'edit']) ->name('admin.estudiante.edit');

//Route::get('/admin/estudiantes/create', [estudianteController::class, 'create'])->name('admin.estudiantes.create');

