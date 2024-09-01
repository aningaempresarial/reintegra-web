<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    public function getUserByCnpj($cnpj) {
        $resposta = Http::get(env('EXTERNAL_API_URL') . "/empresa/usuario/cnpj/" . $cnpj);
        if ($resposta->successful()) {
            return $resposta->json();
        } else {
            echo "erro";
        }
    }
    public function desativarConta(Request $request, $user) {
        $dados = [
            'senha' => $request->input('senha'),
            'confirmaSenha' => $request->input('confirma-senha'),
        ];
    
        if (empty($dados['senha']) || empty($dados['confirmaSenha'])) {
            return redirect()->back()->withErrors(['error' => 'As senhas não podem ser vazias.'])->withInput();
        }
    
        if ($dados['senha'] !== $dados['confirmaSenha']) {
            return redirect()->back()->withErrors(['error' => 'As senhas não coincidem.'])->withInput();
        }
    
        try {
            $resposta = Http::asMultipart()->put(env('EXTERNAL_API_URL') . '/user/inativar/' . $user, $dados);
    
            Log::info('Resposta da API:', [
                'status' => $resposta->status(),
                'body' => $resposta->body()
            ]);
    
            if ($resposta->successful()) {
                return redirect('/')->with('success', 'Conta inativada com sucesso.');
            } else {
                $errorMessages = $resposta->json('errors', ['error' => 'Não foi possível inativar a empresa.']);
                return redirect()->back()->withErrors($errorMessages)->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Erro ao inativar conta:', [
                'exception' => $e->getMessage()
            ]);
            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao tentar inativar a conta.'])->withInput();
        }
    }    
}
