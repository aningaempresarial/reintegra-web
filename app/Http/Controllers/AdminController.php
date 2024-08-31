<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function getData() {

        $dados = [
            'token' => session('token'),
        ];

        if (!$dados['token']) {
            return redirect()->route('login')->with('error', 'Usuário não autenticado.');
        }

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/admin/getdata', $dados);

        if ($resposta->successful()) {
            return view('admin/dashboard', ['nome' => $resposta['nomeAdmin']]);
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Erro inesperado. Faça o login novamente.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }

    }

    public function getUsers(Request $request) {
        $tipoEntidade = $request->query('tipoEntidade');
        $nome = $request->query('nome');

        $dados = [
            'token' => session('token'),
            'tipoEntidade' => $tipoEntidade,
            'nome' => $nome,
        ];

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/admin/getdata', $dados);
        $dados_users = Http::get(env('EXTERNAL_API_URL') . '/admin/usuario', [
            'tipoEntidade' => $tipoEntidade,
            'nome' => $nome
        ]);

        if ($resposta->successful()) {
            return view('admin/users/index', [
                'nome' => $resposta['nomeAdmin'],
                'usuarios' => $dados_users->json()
            ]);
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Erro inesperado. Faça o login novamente.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }
}
