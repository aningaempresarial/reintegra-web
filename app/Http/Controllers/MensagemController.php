<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

}
