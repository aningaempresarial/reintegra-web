<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CepController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/login', [LoginController::class, 'index']);

Route::get('/doacao', function () {
    return view('doacao');
});

Route::get('/info-empresa', function () {
    return view('empresa-info');
});

Route::get('/teste', [EmpresaController::class, 'index']);

/*Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
});*/

Route::get('/ong/dashboard', function () {
    return view('/ong/dashboard');
});

Route::get('/empresa/mensagens', function () {
    return view('/empresa/chat');
});

Route::get('/admin/dashboard', [AdminController::class, 'getData']);

Route::get('/admin/users', [AdminController::class, 'getUsers']);

Route::get('/empresa/dashboard', [EmpresaController::class, 'index'])->name('empresa-dashboard');

Route::get('/empresa/config', [EmpresaController::class, 'index'])->name('empresa-config');

Route::post('/cadastrar-empresa', [EmpresaController::class, 'store']);

Route::get('/cadastrar-infos-empresa', [EmpresaController::class, 'storeImportantInfo']);

Route::put('/atualizar-empresa/{user}', [EmpresaController::class, 'update']);

Route::post('/cadastrar-endereco-empresa/{usuario}', [EmpresaController::class,'createAddress']);

Route::put('/atualizar-endereco-empresa/{usuario}', [EmpresaController::class,'updateAddress']);

Route::get('/empresa/perfil', [EmpresaController::class, 'index'])->name('empresa-perfil');

Route::put('/inativar-empresa/{usuario}', [UsuarioController::class, 'desativarConta']);

Route::get('/admin/users', function () {
    return view('admin/users/index');
});

Route::post('/login-usuario', [LoginController::class, 'login']);

Route::get('/usuario/cnpj/{cnpj}', [UsuarioController::class, 'getUserByCnpj']);

Route::get('/cep/{cep}', [CepController::class, 'consultarCep']);

/* ADMIN PAINEL */
Route::post('/admin/change', [AdminController::class, 'changeStatusUser']);

Route::get('/admin/config', [AdminController::class, 'configData']);

/* Alterar Usuario Dados */

Route::post('/usuario/atualizar-dados', [UsuarioController::class,'updateDadosUsuario']);

Route::post('/usuario/atualizar-senha', [UsuarioController::class,'updateSenhaUsuario']);
