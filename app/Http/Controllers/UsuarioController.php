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


    public function updateDadosUsuario(Request $request) {
        $usuario = $request->get('usuario');
        $senha = $request->get('senha');
        $new_usuario = $request->get('new_usuario');
        $new_email = $request->get('new_email');

        $dados = [
            'usuario' => $usuario,
            'senha' => $senha,
            'new_usuario' => $new_usuario,
            'new_email' => $new_email
        ];

        $resposta = Http::asMultipart()->put(env('EXTERNAL_API_URL') . '/user/update', $dados);

        if ($resposta->successful()) {
            return redirect()->back()->with('success', 'Dados atualizados com êxito!');
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Erro ao atualizar dados do usuário.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }

    }

    public function updateSenhaUsuario(Request $request) {
        $usuario = $request->get('usuario');
        $senha = $request->get('senha');
        $new_senha = $request->get('new_senha');

        $dados = [
            'usuario' => $usuario,
            'senha' => $senha,
            'new_senha' => $new_senha,
        ];

        $resposta = Http::asMultipart()->put(env('EXTERNAL_API_URL') . '/user/pass', $dados);

        if ($resposta->successful()) {
            return redirect()->back()->with('success', 'Senha atualizada com êxito!');
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Erro ao atualizar senha do usuário.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }

    }

    public function verificarCNPJ($cnpj) {
        $resposta = Http::asMultipart()->get(env('EXTERNAL_API_URL') . '/user/verificar/cnpj/'. $cnpj);

        if ($resposta->successful()) {
            return $resposta->json();
        } else {
            return $resposta->json('errors', ['error' => 'Erro inesperado.']);
        }
    }


    public function verificarEmail($email) {
        $resposta = Http::asMultipart()->get(env('EXTERNAL_API_URL') . '/user/verificar/email/'. $email);

        if ($resposta->successful()) {
            return $resposta->json();
        } else {
            return $resposta->json('errors', ['error' => 'Erro inesperado.']);
        }
    }
}
