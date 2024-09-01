<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
}
