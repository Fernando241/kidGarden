<?php

use App\Http\Controllers\AcudienteController;
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
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PerfilEstudianteController;

Route::get('/', [inicioController::class, 'inicio'])->name('inicio');

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dasboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* rutas a vistas de la pagina */

Route::get('/noticias', [NoticiaController::class, 'noticias']);

Route::get('/nosotros', [nosotrosController::class, 'nosotros']);

Route::get('/galeria', [galeriaController::class, 'galeria']);

Route::get('/niveles', [nivelesController::class, 'niveles']);

/* rutas para llamar los datos de las solicitudes*/

Route::get('/solicituds/existing', [SolicitudController::class, 'existing'])->name('solicituds.existing');
Route::resource('/solicituds', solicitudController::class)->names('solicituds');
Route::post('/solicituds/accept/{id}', [SolicitudController::class, 'accept'])->name('solicituds.accept'); //ruta para el index de solicitud para aceptar la solicitud directamente


/*  rutas para llamar los datos de la tabla estudiantes */

Route::resource('/estudiantes', estudianteController::class)->middleware('can:estudiantes')->names('estudiantes');
Route::get('PerfilEstudiante', [PerfilEstudianteController::class, 'PerfilEstudiante'])->name('PerfilEstudiante')->middleware('auth');


//rutas para llamar los datos de la tabla acudientes

Route::resource('/acudientes', AcudienteController::class)->middleware('can:acudientes')->names('acudientes');

//rutas para llamar datos de la tabla Cursos

Route::resource('/cursos', CursoController::class)->middleware('can:cursos')->names('cursos');
Route::post('/cursos/asignar-estudiantes', 'CursoController@asignarEstudiantes')->name('cursos.asignarEstudiantes'); //pendiente para agregar estudiantes

//rutas para Docentes

Route::resource('/docentes', DocenteController::class)->middleware('can:docentes')->names('docentes');

//rutas para el Panel Administrativo

Route::resource('/valores', ValorController::class)->names('valores');

Route::resource('/bancos', BancoController::class)->names('bancos');

Route::get('/pagos', [adminController::class, 'pagos'])->middleware('can:pagos')->name('pagos');

//rutas para usuarios con roles

Route::resource('users', UserController::class)->middleware('can:usuarios')->only(['index', 'edit', 'update'])->names('admin.users'); //Ruta protegida

//rutas para la gestión de matriculas

Route::resource('/matriculas', MatriculaController::class)->names('matriculas');
Route::get('/buscar-estudiante/{documento}', [EstudianteController::class, 'buscarEstudiante']);

//Rutas para pagos por Paypal

Route::get('createpaypal', [PaypalController::class, 'createpaypal'])->name('createpaypal');
Route::post('processPaypal', [PaypalController::class, 'processPaypal'])->name('processPaypal');
Route::get('processSuccess', [PaypalController::class, 'processSuccess'])->name('processSuccess');
Route::get('processCancel', [PaypalController::class, 'processCancel'])->name('processCancel');

//rutas para editar las noticias de la pagina web
Route::resource('/noticias', NoticiaController::class)->names('noticias');
