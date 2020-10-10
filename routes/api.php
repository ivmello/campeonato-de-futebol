<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\PlayersInsideController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function() {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('teams', TeamsController::class, ['only' =>
        ['index', 'store', 'show', 'update']
    ]);
    Route::resource('teams.players', PlayersController::class, ['only' =>
        ['index', 'update']
    ]);
    Route::resource('players', PlayersController::class, ['only' =>
        ['index', 'store', 'show', 'update']
    ]);
});
