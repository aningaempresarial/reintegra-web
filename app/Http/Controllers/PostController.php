<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class PostController extends Controller
{
    public function saveVaga(Request $request) {
        $dados = [
            'titulo' => $request->input('tituloPosicao'),
            'descricao' => $request->input('descricaoVaga'),
            'dtFim' => $request->input('dtFim'),
            'token' => $request->input('token'),
        ];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            $multipartData = [];
            foreach ($dados as $key => $value) {
                $multipartData[] = [
                    'name' => $key,
                    'contents' => $value
                ];
            }

            $multipartData[] = [
                'name' => 'imagem',
                'contents' => fopen($foto->getRealPath(), 'r'),
                'filename' => $foto->getClientOriginalName()
            ];

            $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/post/vaga/', $multipartData);
        } else {
            return response()->json(['error' => 'Nenhuma imagem enviada.'], 400);
        }

        // Verificar a resposta da requisição
        if ($resposta->successful()) {
            $postResponse = $resposta->json();
            $postId = $postResponse['idPost'];
            $vagaId = $postResponse['idVaga'];

            return response()->json(['postId' => $postId, 'vagaId' => $vagaId]);
        } else {
            return response()->json(['error' => 'Erro ao cadastrar a vaga: ' . $resposta->body()], 500);
        }
    }

}
