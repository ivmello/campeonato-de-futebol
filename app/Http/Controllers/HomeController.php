<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return response()->json([
            'data' => 'Bem-vindo a API de controle de partidas de futebol de salão',
        ]);
    }
}
