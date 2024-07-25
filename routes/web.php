<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\administradorController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\estudianteController;
use App\Http\Controllers\galeriaController;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\nivelesController;
use App\Http\Controllers\nosotrosController;
use App\Http\Controllers\noticiasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\solicitudController;
use App\Http\Controllers\ValorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [inicioController::class, 'inicio'])->name('inicio');

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

/* Route::get('/noticias', [noticiasController::class, 'noticias']); */

Route::get('/nosotros', [nosotrosController::class, 'nosotros']);

Route::get('/galeria', [galeriaController::class, 'galeria']);

Route::get('/niveles', [nivelesController::class, 'niveles']);

/* rutas para llamar los datos de las solicitudes*/

Route::resource('/solicituds', solicitudController::class)->names('solicituds');

/*  rutas para llamar los datos de la tabla estudiantes */

Route::resource('/estudiantes', estudianteController::class)->names('estudiantes');

//rutas para llamar datos de la tabla Cursos

Route::resource('/cursos', CursoController::class)->names('cursos');
Route::post('/cursos/asignar-estudiantes', 'CursoController@asignarEstudiantes')->name('cursos.asignarEstudiantes');

//rutas para Docentes

Route::resource('/docentes', DocenteController::class)->names('docentes');

//rutas para el Panel Administrativo

Route::resource('/valores', ValorController::class)->names('valores');

Route::resource('/bancos', BancoController::class)->names('bancos');


Route::get('/pagos', [adminController::class, 'pagos'])->name('pagos');
Route::get('/agregar-admin', [adminController::class, 'agregarAdmin'])->name('agregar.admin');

