<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ArrendadorController;

Route::get('/login', [CustomAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomAuthController::class, 'login'])->name('login.custom');
Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/arrendadores/dashboard', function () {
        return view('arrendadores.dashboard'); // Cambia la vista si es necesario
    })->name('arrendadores.dashboard');

    Route::get('/agencia/dashboard', function () {
        return view('agencia.dashboard'); // Cambia la vista si es necesario
    })->name('agencia.dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Cambia la vista si es necesario
    })->name('admin.dashboard');
});





    Route::get('/dashboard', function () {
        return view('arrendadores.dashboard'); // Cambia la vista si es necesario
    })->name('arrendadores.dashboard');
    
    Route::get('/agregar-propiedad', [ArrendadorController::class, 'showAgregarPropiedad'])->name('arrendador.agregarPropiedad');
    Route::post('/agregar-propiedad', [ArrendadorController::class, 'storePropiedad'])->name('arrendador.storePropiedad');
    

    
    Route::get('/ver-arrendatarios', [ArrendadorController::class, 'verArrendatarios'])->name('arrendador.verArrendatarios');
    Route::get('/mi-perfil', [ArrendadorController::class, 'miPerfil'])->name('arrendador.miPerfil');
    Route::get('/editar-perfil', [ArrendadorController::class, 'editarPerfil'])->name('arrendador.editarPerfil');
    Route::get('/buscar', [ArrendadorController::class, 'buscar'])->name('arrendador.buscar');

  
    Route::get('/arrendador/propiedades', [ArrendadorController::class, 'index'])->name('arrendador.index');
    Route::get('/arrendador/propiedades/agregar', [ArrendadorController::class, 'showAgregarPropiedad'])->name('arrendador.showAgregarPropiedad');
    Route::post('/arrendador/propiedades', [ArrendadorController::class, 'storePropiedad'])->name('arrendador.storePropiedad');
    Route::get('/arrendador/propiedades/editar/{id}', [ArrendadorController::class, 'showEditarPropiedad'])->name('arrendador.showEditarPropiedad');
    Route::put('/arrendador/propiedades/{id}', [ArrendadorController::class, 'updatePropiedad'])->name('arrendador.updatePropiedad');
    Route::delete('/arrendador/propiedades/{id}', [ArrendadorController::class, 'destroy'])->name('arrendador.destroy');

    
    // Guardar reporte y crear arrendatario
    Route::get('/reportes/agregar', [ArrendadorController::class, 'showAgregarReporte'])->name('arrendador.showAgregarReporte');
    Route::post('/reportes', [ArrendadorController::class, 'guardarReporte'])->name('arrendador.guardarReporte');

    Route::get('/arrendador/ver-arrendatarios', [ArrendadorController::class, 'verArrendatarios'])->name('arrendador.verArrendatarios');

    Route::get('/arrendador/perfil', [ArrendadorController::class, 'miPerfil'])->name('arrendador.perfil');
    Route::post('/arrendador/actualizar-perfil', [ArrendadorController::class, 'actualizarPerfil'])->name('arrendador.actualizarPerfil');

    Route::get('/arrendador/editar-arrendatario/{id}', [ArrendadorController::class, 'editarArrendatario'])->name('arrendador.editarArrendatario');
    Route::put('/arrendador/actualizar-arrendatario/{id}', [ArrendadorController::class, 'actualizarArrendatario'])->name('arrendador.actualizarArrendatario');
    Route::delete('/arrendador/eliminar-arrendatario/{id}', [ArrendadorController::class, 'eliminarArrendatario'])->name('arrendador.eliminarArrendatario');
    










Route::get('/register', function () {
    return view('auth.register');
})->name('register.form'); 

Route::post('/register', [AuthController::class, 'register'])->name('register.custom');



Route::get('/', function () {
    return view('welcome');
});







