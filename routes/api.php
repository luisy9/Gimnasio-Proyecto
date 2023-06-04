<?php

use App\Http\Controllers\API\TarifaController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\ClasesController;
use App\Http\Controllers\API\EjerciciosController;
use App\Http\Controllers\API\EntrenamientoController;
use App\Http\Controllers\API\PagoController;
use App\Models\role;
use Database\Seeders\EjercicioSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware(['auth:sanctum']);
// Route::group(['prefix' => 'posts', 'middleware' => 'auth:sanctum'], function () {
//     Route::get('/', [PostController::class, 'index']);
//     Route::post('add', [PostController::class, 'add']);
// });
Route::get('tarifas', [TarifaController::class, 'index']);
Route::post('tarifasSelect', [TarifaController::class, 'selectTarifas']);
Route::post('userSelect', [UserController::class, 'selectUser']);
Route::post('rolesSelect', [RoleController::class, 'selectRoles']);
Route::get('roles', [RoleController::class, 'allRoles']);
Route::post('createUsers', [AdminController::class, 'addUser']);
Route::get('users', [AdminController::class, 'allUsers']);
Route::delete('deleteUsers/{id}', [AdminController::class, 'delete']);
Route::post('update/{id}/{idroles}', [AdminController::class, 'updateUsers']);
Route::delete('deleteRoles/{id}', [RoleController::class, 'roleDelete']);
Route::get('rolesUser/{id}', [AdminController::class, 'userRoles']);
Route::post('pago/{idtarifa}/{iduser}', [PagoController::class, 'pagoFactura']);
Route::delete('tarifasDelete/{id}', [AdminController::class, 'deleteTarifas']);
Route::get('facturas/{id}', [PagoController::class, 'selectFactura']);
Route::get('tarifaActual/{id}', [TarifaController::class, 'selectTarifaUser']);
Route::get('facturasTarifas/{id}', [PagoController::class, 'selectPagoTarifa']);
Route::delete('deleteFactura/{id}', [PagoController::class, 'bajaFactura']);
Route::get('membership/{id}', [PagoController::class, 'isMembership']);
Route::get('showUserUpdate/{id}', [AdminController::class, 'showUser']);
Route::delete('cambiarTarifas/{idTarifa}/{idUser}/{nombre_completo}/{numero_tarjeta}', [UserController::class, 'changeTarifa']);
Route::get('showCategorias', [EjerciciosController::class, 'categorias']);
Route::post('createTarifas', [AdminController::class, 'newTarifas']);
Route::get('showTarifaUpdate/{idtarifa}', [AdminController::class, 'showTarifa']);
Route::post('updateTarifa/{idtarifa}', [AdminController::class, 'updatetarifa']);
Route::get('showMuscles', [EntrenamientoController::class, 'showCategorias']);
Route::get('showMusculitos/{idcategoria}', [EntrenamientoController::class, 'musculitosCategoria']);
Route::get('showCategoria/{idcategoria}', [EntrenamientoController::class, 'categoria']);
Route::get('isUserPro/{iduser}', [EntrenamientoController::class, 'isPro']);
Route::post('crearRutina/{userid}', [EntrenamientoController::class, 'createRutina']);
Route::post('editUser/{iduser}', [AdminController::class, 'editUser']);
// Route::get('search', [EntrenamientoController::class, 'search']);
Route::get('search/{nombre}', [EntrenamientoController::class, 'search']);
Route::get('hasTarifa/{iduser}', [EntrenamientoController::class, 'hasTarifa']);
Route::get('ejercicios', [AdminController::class, 'ejericicios']);
Route::delete('deleteEjercicios/{idejercicio}', [AdminController::class, 'deleteEjercicios']);
Route::get('showEjercicioUpdate/{id}', [AdminController::class, 'showEjericioUpdate']);
Route::post('updateEjercicio/{idejercicio}', [AdminController::class, 'updateEjercicio']);
Route::post('createEjercicio', [AdminController::class, 'createEjercicio']);
Route::post('updateRutina/{idrutina}', [AdminController::class, 'updateRutina']);
Route::delete('deleteRutina/{id}', [AdminController::class, 'deleteRutina']);
Route::get('clases', [ClasesController::class, 'clases']);
Route::get('claseSeleccionada/{idclase}', [ClasesController::class, 'clasesSelect']);
Route::post('unirteClase/{iduser}/{idclase}', [ClasesController::class, 'unirseClase']);
Route::get('numeroClasesUser/{iduser}', [ClasesController::class, 'numClases']);
Route::get('hasClases/{iduser}', [ClasesController::class, 'hasClases']);
Route::delete('deleteClase/{id}', [ClasesController::class, 'deleteClases']);
Route::post('createClases', [AdminController::class, 'createClases']);
Route::get('clases', [AdminController::class, 'clases']);
Route::get('updateClases', [AdminController::class, 'clases']);
Route::delete('ClasesDelete/{id}', [AdminController::class, 'deleteClases']);
Route::get('showClaseUpdate/{id}', [AdminController::class, 'showClases']);
Route::post('updateClase/{id}', [AdminController::class, 'updateClases']);
Route::post('createRoles', [AdminController::class, 'createRoles']);
Route::post('updateRoles/{idrole}', [AdminController::class, 'updateRoles']);
Route::get('busquedaImgRutina/{data}', [EntrenamientoController::class, 'busquedaImg']);
Route::get('getImg/{nombre_ejercicio}', [EjerciciosController::class, 'getImg']);
Route::get('rutinaUser/{id_rutina}',[EjerciciosController::class, 'showRutina']);
Route::get('hasRutinaUser/{idUser}/{id_rutina}',[EjerciciosController::class, 'RutinaPrintUpdate']);
Route::get('getImgEjercicio/{ejercicio}',[EjerciciosController::class, 'imagenEjercicio']);
Route::delete('deleteRutinaAnterior/{id_rutina}',[EjerciciosController::class, 'deleteRutinaAnterior']);
Route::get('numRutina',[EntrenamientoController::class, 'numRutinas']);

