<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class EmpresaController extends Controller
{
    public function index()
    {
        $response = Http::get(env('EXTERNAL_API_URL') . '/empresa');

        if ($response->successful()) {
            $data = $response->json();
            return view('teste', compact('data'));
        } else {
            return response()->json(['error' => 'Algo deu errado...'], $response->status());
        }
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'senha' => 'required|string|min:8|confirmed',
        ]);
    
        $dados = [
            'nome' => $request->input('nome'),
            'cnpj' => $request->input('cnpj'),
            'email' => $request->input('email'),
            'senha' => $request->input('senha'),
        ];
    
        $resposta = Http::post(env('EXTERNAL_API_URL') . '/empresa', $dados);

        Log::info('Resposta da API:', [
            'status' => $resposta->status(),
            'body' => $resposta->body()
        ]);

        if ($resposta->successful()) {
            return redirect()->route('home');
        } else { 
            $errorMessages = $resposta->json('errors', ['error' => 'Não foi possível cadastrar a empresa.']);
            return redirect()->back()->withErrors($errorMessages)->withInput();
        }
    }
}
