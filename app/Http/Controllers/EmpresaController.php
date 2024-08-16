<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

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
}

