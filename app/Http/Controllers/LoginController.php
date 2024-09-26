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

            return view('login', ['areas' => $res['areas'], 'estados' => ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MS', 'MT', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'], 'API_URL' => env('EXTERNAL_API_URL')]);
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



    public function createEmpresa(Request $request) {

        $dados = [
            'nome' => $request->input('nome'),
            'cnpj' => $request->input('cnpj'),
            'email' => $request->input('email'),
            'atuacao' => $request->input('atuacao'),
            'senha' => $request->input('senha'),
        ];

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/empresa', $dados);


        if ($resposta->successful()) {
            $res = $resposta->json();

            $usuario = $res['usuario'];
            $perfil_id = $res['perfil'];
            $foto_usuario = env('EXTERNAL_API_URL') . '/public/profiles/'. $perfil_id .'/foto.jpg';
            $mensagem = $res['mensagem'];


            $dados_residenciais = [
                'logradouro' => $request->input('logradouro'),
                'numero' => $request->input('numero'),
                'complemento' => $request->input('complemento'),
                'cep' => $request->input('cep'),
                'bairro' => $request->input('bairro'),
                'cidade' => $request->input('cidade'),
                'estado' => $request->input('estado')
            ];

            $resposta_endereco = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/empresa/endereco/' . $usuario, $dados_residenciais);


            $dados_telefonicos = [
                'numero' => $request->input('telefone'),
                'visibilidade' => 'false',
            ];

            $resposta_telefone = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/empresa/telefone/' . $usuario, $dados_telefonicos);

            return response()->json(['foto_usuario' => $foto_usuario, 'usuario' => $usuario]);
        } else {
            return response()->json(['error' => 'Aconteceu um erro inesperado. Tente novamente mais tarde!'], $resposta->status());
        }
    }

    public function createOng(Request $request) {

        $dados = [
            'nome' => $request->input('nome'),
            'cnpj' => $request->input('cnpj'),
            'email' => $request->input('email'),
            'senha' => $request->input('senha'),
        ];

        $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/ong', $dados);


        if ($resposta->successful()) {
            $res = $resposta->json();

            $usuario = $res['usuario'];
            $perfil_id = $res['perfil'];
            $foto_usuario = env('EXTERNAL_API_URL') . '/public/profiles/'. $perfil_id .'/foto.jpg';
            $mensagem = $res['mensagem'];


            $dados_residenciais = [
                'logradouro' => $request->input('logradouro'),
                'numero' => $request->input('numero'),
                'complemento' => $request->input('complemento'),
                'cep' => $request->input('cep'),
                'bairro' => $request->input('bairro'),
                'cidade' => $request->input('cidade'),
                'estado' => $request->input('estado')
            ];

            $resposta_endereco = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/ong/endereco/' . $usuario, $dados_residenciais);


            $dados_telefonicos = [
                'numero' => $request->input('telefone'),
                'visibilidade' => 'false',
            ];

            $resposta_telefone = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/ong/telefone/' . $usuario, $dados_telefonicos);

            return response()->json(['foto_usuario' => $foto_usuario, 'usuario' => $usuario]);
        } else {
            return response()->json(['error' => 'Aconteceu um erro inesperado. Tente novamente mais tarde!'], $resposta->status());
        }
    }
}
