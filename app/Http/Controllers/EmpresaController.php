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
        $resposta = Http::get(env('EXTERNAL_API_URL') . '/empresa');

        if ($resposta->successful()) {
            $data = $resposta->json();
            return view('teste', compact('data'));
        } else {
            return response()->json(['error' => 'Algo deu errado...'], $resposta->status());
        }
    }

    public function store(Request $request) {
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
            session(['user' => $user['usuario']]);
            session(['nome' => $request->input('nome')]);
            session(['cnpj' => $request->input('cnpj')]);
            session(['email' => $request->input('email')]);
            session(['senha' => $request->input('senha')]);
            return redirect('/cadastro');
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Não foi possível cadastrar a empresa.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }

    public function storeAddress(Request $request) {
        $dadosEndereco = [
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('num'),
            'cep' => $request->input('cep'),
            'bairro' => $request->input('bairro'),
            'estado' => $request->input('estado'),
        ];

        $user = session('user');

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/empresa/endereco/' . $user, $dadosEndereco);

        $dadosTelefone = [
            'numero' => $request->input('telefone'),
        ];

        $resposta2 = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/empresa/telefone/' . $user, $dadosTelefone);

        if ($resposta->successful() && $resposta2->successful()) {
            session(['telefone'=> $request->input('telefone')]);
            session(['cep'=> $request->input('cep')]);
            session(['logradouro'=> $request->input('logradouro')]);
            session(['num'=> $request->input('num')]);
            session(['bairro'=> $request->input('bairro')]);
            session(['cidade'=> $request->input('cidade')]);
            session(['estado'=> $request->input('estado')]);
            return redirect('/empresa/dashboard');
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Não foi possível cadastrar a empresa.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }

    public function update(Request $request, $user) {
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
            session(['nome'=> $dados['nome']]);
            session(['emailcontato'=> $dados['emailContato']]);
            return redirect('/empresa/config');
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Não foi possível atualizar a empresa.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }

}
