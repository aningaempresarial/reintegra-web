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
            $user = $userController->getUserByCnpj($request->input('cnpj'));
            session(['user' => $user]);
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
            return redirect('/empresa/dashboard');
        } else { 
            $errorMessages = $resposta->json('errors', ['error' => 'Não foi possível cadastrar a empresa.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }

}
