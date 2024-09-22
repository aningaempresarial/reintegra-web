<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function index(Request $request) {

        $resposta = Http::asMultipart()->get(env('EXTERNAL_API_URL') . '/empresa/area-atuacao/get');

        if ($resposta->successful()) {
            $res = $resposta->json();

            return view('login')->with('areas', $res['areas']);
        } else {
            $errorMessages = $resposta->json('errors', ['error' => 'O "Reintegra" está em manutenção. Volte mais tarde!']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }

    }

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
                $controller = new EmpresaController();
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
