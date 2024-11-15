<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class PostController extends Controller
{
    public function saveVaga(Request $request) {
        $horario = $request->input('horarioInicio') . ' - ' . $request->input('horarioTermino');
        $dados = [
            'titulo' => $request->input('tituloPosicao'),
            'descricao' => $request->input('descricaoVaga'),
            'requisitos' => $request->input('requisitosVaga'),
            'salario' => $request->input('checkSalario') ? null : $request->input('salarioVaga'),
            'tipoContrato' => $request->input('tipoContrato'),
            'escolaridade' => $request->input('escolaridadeVaga'),
            'cargaHoraria' => $request->input('cargaHoraria'),
            'horario' => $horario,
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

        if ($resposta->successful()) {
            $postResponse = $resposta->json();
            $postId = $postResponse['idPost'];
            $vagaId = $postResponse['idVaga'];

            return response()->json(['postId' => $postId, 'vagaId' => $vagaId]);
        } else {
            return response()->json(['error' => 'Erro ao cadastrar a vaga: ' . $resposta->body()], 500);
        }
    }

    public function savePost(Request $request) {
        $dados = [
            'titulo' => $request->input('tituloPosicao'),
            'descricao' => $request->input('descricaoVaga'),
            'token' => $request->input('token'),
            'tipo' => $request->input('tipo')
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

            $resposta = Http::asMultipart()->post(env('EXTERNAL_API_URL') . '/post/', $multipartData);
        } else {
            return response()->json(['error' => 'Nenhuma imagem enviada.'], 400);
        }

        if ($resposta->successful()) {
            $postResponse = $resposta->json();
            $postId = $postResponse['idPost'];

            return response()->json(['postId' => $postId]);
        } else {
            return response()->json(['error' => 'Erro ao cadastrar a vaga: ' . $resposta->body()], 500);
        }
    }

    public function deletePost($id) {
        $resposta = Http::put(env('EXTERNAL_API_URL') . '/post/status/' . $id);

        if ($resposta->successful()) {
            return redirect()->back();
        } else {
            return response()->json(['error' => 'Erro ao excluir a postagem: ' . $resposta->body()], 500);
        }
    }
}
