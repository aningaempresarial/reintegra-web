<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use Carbon\Carbon;

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

        $stats = Http::get(env('EXTERNAL_API_URL') . '/admin/stats');

        Carbon::setLocale('pt_BR');
        $cadastros = Http::get(env('EXTERNAL_API_URL') . '/admin/usuario/lasts')->json();
        $cadastros = collect($cadastros)->map(function ($cadastro) {
            if (isset($cadastro['dataCriacao'])) {
                $cadastro['dataCriacao'] = Carbon::parse($cadastro['dataCriacao'])->diffForHumans();
            }
            return $cadastro;
        });

        if ($resposta->successful()) {
            return view('admin/dashboard', ['nome' => $resposta['nomeAdmin'], 'data' => $resposta->json(), 'API_URL' => env('EXTERNAL_API_URL'), 'stats' => $stats, 'cadastros' => $cadastros]);
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

    public function getPosts(Request $request) {
        $tipoEntidade = $request->query('tipoEntidade');
        $nome = $request->query('nome');

        $dados = [
            'token' => session('token'),
            'tipoEntidade' => $tipoEntidade,
            'nome' => $nome,
        ];

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/admin/getdata', $dados);
        $dados_posts = Http::get(env('EXTERNAL_API_URL') . '/post/all');

        if ($resposta->successful()) {
            return view('admin/posts', [
                'data' => $resposta->json(),
                'API_URL' => env('EXTERNAL_API_URL'),
                'nome' => $resposta['nomeAdmin'],
                'publicacoes' => $dados_posts->json()
            ]);
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Erro inesperado.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }

    public function changeStatusUser(Request $request) {
        $usuario = $request->get('usuario');
        $status = $request->get('status');
        $motivo = $request->get('motivo');

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
                'motivo' => $motivo
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

    public function setoresEmpresas() {
        $resposta = Http::get(env('EXTERNAL_API_URL') . '/admin/setoresempresas');

        if ($resposta->successful()) {
            return response()->json($resposta->json());
        } else {
            return response()->json(['error' => 'Erro ao buscar os dados ou resposta inválida.', 'response' => $resposta->body()], 500);
        }
    }
    public function usuariosMensais() {
        $resposta = Http::get(env('EXTERNAL_API_URL') . '/admin/usuario/mensal');

        if ($resposta->successful()) {
            return response()->json($resposta->json());
        } else {
            return response()->json(['error' => 'Erro ao buscar os dados ou resposta inválida.', 'response' => $resposta->body()], 500);
        }
    }

    public function vagaPost(Request $request, $id) {
        $tipoEntidade = $request->query('tipoEntidade');
        $nome = $request->query('nome');

        $dados = [
            'token' => session('token'),
            'tipoEntidade' => $tipoEntidade,
            'nome' => $nome,
        ];

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/admin/getdata', $dados);
        $dados_vaga = Http::get(env('EXTERNAL_API_URL') . '/post/vagas/id/' . $id);

        if ($resposta->successful()) {
            return response()->json([
                'vaga' => $dados_vaga->json()
            ]);
        } else {
            return response()->json([
                'error' => 'Erro ao buscar dados da vaga'
            ], 500);
        }
    }
}
