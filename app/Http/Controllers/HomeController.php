<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return response()->json([
            'data' => 'Bem-vindo a API do sistema de controle de partidas de futsal da Before',
        ]);
    }
}
