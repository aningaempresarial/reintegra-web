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
            return view('admin/dashboard', ['nome' => $resposta['nomeAdmin'], 'data' => $resposta->json(), 'API_URL' => env('EXTERNAL_API_URL')]);
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
                'data' => $resposta->json(),
                'API_URL' => env('EXTERNAL_API_URL'),
                'nome' => $resposta['nomeAdmin'],
                'usuarios' => $dados_users->json(),
            ]);
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Erro inesperado. Faça o login novamente.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }

    public function changeStatusUser(Request $request) {
        $usuario = $request->get('usuario');
        $status = $request->get('status');

        $dados = [
            'token' => session('token'),
        ];

        if (!$dados['token']) {
            return redirect()->route('login')->with('error', 'Usuário não autenticado.');
        }

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/admin/getdata', $dados);

        if ($resposta->successful()) {
            $usuario_admin = $resposta['usuario'];

            if ($usuario == $usuario_admin) {
                $errorMessages = $resposta->json('errors', ['error' => 'Você não pode se auto-bloquear ou remover do sistema!']);
                return redirect()->back()->withErrors($errorMessages)->withInput();
            }

            $dados = [
                'status' => $status,
            ];

            $resposta = Http::asMultipart()->put(env('EXTERNAL_API_URL') . '/admin/usuario/status/' . $usuario, $dados);

            if ($resposta->successful()) {
                return redirect()->back()->with('success', 'Usuario `' . $usuario . '` ' . $status . ' com êxito!');
            } else {
                $errorMessages = $resposta->json('errors', ['error' => 'Erro ao mudar status do usuário. Tente novamente mais tarde!']);
                return redirect()->back()->withErrors($errorMessages)->withInput();
            }

        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Erro inesperado. Faça o login novamente.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }

    public function configData() {

        $dados = [
            'token' => session('token'),
        ];

        if (!$dados['token']) {
            return redirect()->route('login')->with('error', 'Usuário não autenticado.');
        }

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/admin/getdata', $dados);

        if ($resposta->successful()) {
            return view('admin/config', [
                'data' => $resposta->json(),
                'API_URL' => env('EXTERNAL_API_URL'),
                'nome' => $resposta['nomeAdmin'],
                'usuario' => $resposta['usuario'],
                'email' => $resposta['emailUsuario']]);
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Erro inesperado. Faça o login novamente.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }

    }

    public function indexPerfil() {
        $dados = [
            'token' => session('token'),
        ];

        if (!$dados['token']) {
            return redirect()->route('login')->with('error', 'Usuário não autenticado.');
        }

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/admin/getdata', $dados);

        if ($resposta->successful()) {
            return view('admin/perfil', [
                'data' => $resposta->json(),
                'API_URL' => env('EXTERNAL_API_URL'),
                'nome' => $resposta['nomeAdmin'],
                'usuario' => $resposta['usuario'],
                'email' => $resposta['emailUsuario']]);
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Erro inesperado. Faça o login novamente.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }

}
