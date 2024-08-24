<?php

use App\Http\Controllers\EmpresaController;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/doacao', function () {
    return view('doacao');
});

Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
});

Route::get('/empresa/dashboard', function () {
    return view('empresa/dashboard');
});

Route::get('/admin/users', function () {
    return view('admin/users/index');
});

Route::get('/admin/config', function () {
    return view('admin/config');
});

Route::get('/empresa/config', function () {
    return view('empresa/config');
});

Route::get('/teste', [EmpresaController::class, 'index']);

Route::post('/cadastrar-empresa', [EmpresaController::class, 'store']);