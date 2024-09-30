<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\UsuarioController;

class EmpresaController extends Controller
{

    public function index()
    {
        $user = session("usuario");

        if (!$user) {
            return redirect('/login')->with('error', 'Usuário não autenticado.');
        }

        $resposta = Http::get(env('EXTERNAL_API_URL') . '/empresa/' . $user);

        if ($resposta->successful()) {
            $data = $resposta->json();

            if (request()->routeIs('empresa-dashboard')) {
                return view('empresa.dashboard', ['data' => $data, 'API_URL' => env('EXTERNAL_API_URL')]);
            } else if (request()->routeIs('empresa-config')) {
                $resposta_areas = Http::asMultipart()->get(env('EXTERNAL_API_URL') . '/empresa/area-atuacao/get');

                if ($resposta_areas->successful()) {
                    $areas = $resposta_areas->json();

                    return view('empresa.config', ['data' => $data, 'usuario' => $data, 'email' => $resposta->json()['emailUsuario'], 'API_URL' => env('EXTERNAL_API_URL'), 'areas' => $areas]);
                } else {
                    return redirect()->back()->with('error', 'Algo deu errado...')->withInput();
                }
            } else if (request()->routeIs('empresa-perfil')) {
                return view('empresa.perfil', ['data' => $data, 'usuario' => $data, 'API_URL' => env('EXTERNAL_API_URL')]);
            } else if (request()->routeIs('empresa-post')) {


                $resPubli = Http::get(env('EXTERNAL_API_URL') . '/post/all/' . $user);

                if ($resPubli->successful()) {
                    return view('empresa.post', ['data' => $data, 'usuario' => $data, 'API_URL' => env('EXTERNAL_API_URL'), 'publicacoes' => $resPubli->json()]);
                }

            } else if (request()->routeIs('empresa-mensagens')) {
                $token = session('token');

                if (!$token) {
                    return back()->with('error', 'Token de autenticação não encontrado.');
                }

                try {
                    $response = Http::get(env('EXTERNAL_API_URL') . '/mensagem/mensagens', [
                        'token' => $token
                    ]);

                    if ($response->successful()) {
                        $mensagensAgrupadas = $response->json();
                        return view('empresa.chat', ['data' => $data, 'usuario' => $data, 'API_URL' => env('EXTERNAL_API_URL'), 'mensagensAgrupadas' => $mensagensAgrupadas]);
                    } else {
                        \Log::error('Erro ao obter mensagens: ' . $response->body());
                        return back()->with('error', 'Erro ao obter as mensagens.');
                    }
                } catch (\Exception $e) {
                    \Log::error('Erro ao conectar à API: ' . $e->getMessage());
                    return back()->with('error', 'Erro ao conectar à API.');
                }
            }
        } else {
            Log::error('Erro na API externa:', [
                'status' => $resposta->status(),
                'body' => $resposta->body()
            ]);

            return redirect()->back()->with('error', 'Algo deu errado...')->withInput();
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'senha' => 'required|string|min:8|confirmed',
        ]);

        $dados = [
            'nome' => $request->input('nome'),
            'cnpj' => $request->input('cnpj'),
            'email' => $request->input('email'),
            'senha' => $request->input('senha'),
        ];

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/empresa', $dados);

        Log::info('Resposta da API:', [
            'status' => $resposta->status(),
            'body' => $resposta->body()
        ]);

        if ($resposta->successful()) {
            $userController = new UsuarioController();
            $user = $userController->getUserByCnpj(str_replace(['.', '/', '-'], '', $request->input('cnpj')));

            session(['usuario' => $user['usuario']]);

            return redirect('/cadastro');
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Não foi possível cadastrar a empresa.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }

    public function storeImportantInfo(Request $request)
    {
        $request->validate([
            'logradouro' => 'required|string|max:255',
            'num' => 'required|string|max:20',
            'cep' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'telefone' => 'required|string|max:20',
        ]);

        $dadosEndereco = [
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('num'),
            'cep' => $request->input('cep'),
            'bairro' => $request->input('bairro'),
            'estado' => $request->input('estado'),
        ];

        $user = session('usuario');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Usuário não autenticado.');
        }

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/empresa/endereco/' . $user, $dadosEndereco);

        $dadosTelefone = [
            'numero' => $request->input('telefone'),
        ];

        $resposta2 = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/empresa/telefone/' . $user, $dadosTelefone);

        Log::info('Resposta da API:', [
            'status' => $resposta->status(),
            'body' => $resposta->body()
        ]);

        Log::info('Resposta da API:', [
            'status' => $resposta2->status(),
            'body' => $resposta2->body()
        ]);

        if ($resposta->successful() && $resposta2->successful()) {
            session(['acesso' => 'primeiro']);
            return redirect('empresa/dashboard');
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Não foi possível cadastrar a empresa.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }


    public function update(Request $request, $user)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'emailContato' => $request->input('email'),
        ];

        $resposta = Http::asMultipart()->put(env('EXTERNAL_API_URL') . '/empresa/' . $user, $dados);

        Log::info('Resposta da API:', [
            'status' => $resposta->status(),
            'body' => $resposta->body()
        ]);

        if ($resposta->successful()) {
            session(['nome' => $dados['nome']]);
            session(['emailcontato' => $dados['emailContato']]);
            return redirect('/empresa/config');
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Não foi possível atualizar a empresa.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }

    public function updateAddress(Request $request, $user)
    {
        $dadosEndereco = [
            'id' => $request->input('id'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('num'),
            'cep' => $request->input('cep'),
            'cidade' => $request->input('cidade'),
            'bairro' => $request->input('bairro'),
            'estado' => $request->input('estado'),
            'complemento' => $request->input('complemento'),
        ];

        $resposta = Http::asMultipart()->put(env('EXTERNAL_API_URL') . '/empresa/endereco/' . $user, $dadosEndereco);

        Log::info('Resposta da API:', [
            'status' => $resposta->status(),
            'body' => $resposta->body()
        ]);

        if ($resposta->successful()) {
            return redirect('/empresa/config');
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Não foi possível atualizar o endereço da empresa.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }

    public function createAddress(Request $request, $user)
    {
        $dadosEndereco = [
            'id' => $request->input('id'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('num'),
            'cep' => $request->input('cep'),
            'bairro' => $request->input('bairro'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'complemento' => $request->input('complemento'),
        ];

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/empresa/endereco/' . $user, $dadosEndereco);

        Log::info('Resposta da API:', [
            'status' => $resposta->status(),
            'body' => $resposta->body()
        ]);

        if ($resposta->successful()) {
            return redirect('/empresa/config');
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Não foi possível cadastrar um endereço da empresa.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }
}
