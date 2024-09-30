<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/verificar/cnpj/{cnpj}', [UsuarioController::class, 'verificarCNPJ']);
Route::get('/user/verificar/email/{email}', [UsuarioController::class, 'verificarEmail']);



Route::post('/empresa/criar', [LoginController::class, 'createEmpresa']);
Route::post('/ong/criar', [LoginController::class, 'createOng']);



Route::post('/cadastrar-vaga', [PostController::class, 'saveVaga']);
