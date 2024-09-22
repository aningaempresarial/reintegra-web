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
            return redirect()->route('login')->with('error', 'Usuário não autenticado.');
        }

        $resposta = Http::get(env('EXTERNAL_API_URL') . '/empresa/' . $user);

        if ($resposta->successful()) {
            $data = $resposta->json();

            if (request()->routeIs('empresa-dashboard')) {
                return view('empresa.dashboard', compact('data'));
            }

            else if (request()->routeIs('empresa-config')) {


                $resposta = Http::get(env('EXTERNAL_API_URL') . '/user/info/' . $user);

                if ($resposta->successful()) {
                    return view('empresa.config', ['data' => $data, 'usuario' => $resposta['usuario'], 'email' => $resposta['emailUsuario']]);
                } else {
                    return redirect()->back()->with('error', 'Algo deu errado...')->withInput();
                }
            }
            else if (request()->routeIs('empresa-perfil')) {

                $resposta = Http::get(env('EXTERNAL_API_URL') . '/user/info/' . $user);

                if ($resposta->successful()) {
                    return view('empresa.perfil', ['data' => $data, 'usuario' => $resposta->json(), 'API_URL' => env('EXTERNAL_API_URL')]);
                } else {
                    return redirect()->back()->with('error', 'Algo deu errado...')->withInput();
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
            'bairro' => $request->input('bairro'),
            'estado' => $request->input('estado'),
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
            'estado' => $request->input('estado'),
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
