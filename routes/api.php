<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\funcionarioscontroller;
use App\Models\Clientes;
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

route::post('clientes', [ClientesController::class, 'clientes']);
route::get('/find/{id}', [ClientesController::class, 'pesquisarPorId']);

route::post('funcionarios', [funcionarioscontroller::class, 'funcionarios']);
route::get('/findF/{id}', [funcionarioscontroller::class, 'pesquisarPorId']);