<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function consultarCep($cep)
    {
        $substituicoes = ['-', '.', '/'];
        $cep = str_replace($substituicoes,'', $cep);

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['erro' => true], 500);
        }
    }
}
