<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MensagemController extends Controller
{
    public function getMensagens($idUsuario)
    {
        $token = session('token');

        if (!$token) {
            return back()->with('error', 'Token de autenticação não encontrado.');
        }

        try {
            $response = Http::get(env('EXTERNAL_API_URL') . '/mensagem/mensagens/' . $idUsuario, [
                'token' => $token
            ]);

            if ($response->successful()) {
                $mensagens = $response->json();
                return response()->json(['mensagens' => $mensagens]);
            } else {
                \Log::error('Erro ao obter mensagens: ' . $response->body());
                return back()->with('error', 'Erro ao obter as mensagens.');
            }
        } catch (\Exception $e) {
            \Log::error('Erro ao conectar à API: ' . $e->getMessage());
            return back()->with('error', 'Erro ao conectar à API.');
        }
    }

    public function enviarMensagem(Request $request)
    {
        $validacao = $request->validate([
            'destinatario' => 'required|string',
            'conteudoMensagem' => 'required|string',
        ]);

        $dados = [
            'token' => session('token'),
            'destinatario' => $validacao['destinatario'],
            'tipo_mensagem' => 'text',
            'conteudo_mensagem' => $validacao['conteudoMensagem'],
        ];

        try {
            $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/mensagem/send', $dados);

            if ($resposta->successful()) {
                session(['contato' => $validacao['destinatario']]);
                return redirect()->route('mensagens-contato')
                    ->with('success', 'Mensagem enviada com sucesso!');
            } else {
                Log::error('Erro ao enviar mensagem: ' . $resposta->body());
                return redirect()->back()->with('error', 'Erro ao enviar a mensagem. Por favor, tente novamente.');
            }

        } catch (\Exception $e) {
            Log::error('Erro ao enviar mensagem: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocorreu um erro ao enviar a mensagem.');
        }
    }
}
