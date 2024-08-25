<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    public function getUserByCnpj($cnpj) {
        $resposta = Http::get(env('EXTERNAL_API_URL') . `/usuario/cnpj/$cnpj`);
        return $resposta;
    }
}
