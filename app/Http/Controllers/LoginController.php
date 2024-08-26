<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function login(Request $request) {

        $request->validate([
            'identificacao' => 'required|string|max:255',
            'senha' => 'required|string|min:8',
        ]);

        $dados = [
            'identificacao' => $request->input('identificacao'),
            'senha' => $request->input('senha'),
        ];

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/user/login', $dados);

        $res = $resposta->json();

        if ($resposta->successful()) {
            $token = $res['token'];
            $entidade = $res['entidade'];
            $usuario = $res['usuario'];

            session(['token' => $token]);
            session(['entidade' => $entidade]);
            session(['usuario' => $usuario]);

            if ($entidade == 'empresa') {
                return redirect('/empresa/dashboard');
            } else if ($entidade == 'ex-detento') {
                $errorMessages = $resposta->json('errors', ['error' => 'Por enquanto, você só pode logar pelo App Reintegra! Baixe nas lojas de aplicativos!']);
                return redirect()->back()->withErrors($errorMessages)->withInput();
            } else if ($entidade == 'admin0' || $entidade == 'admin1') {
                return redirect('/admin/dashboard');
            }

        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'Usuário ou senha incorretos. Máximo de tentativas 3.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }
}
