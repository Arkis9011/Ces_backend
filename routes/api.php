<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;

/*
|--------------------------------------------------------------------------
| API Routes - Exposition des données
|--------------------------------------------------------------------------
*/

// Routes publiques pour récupérer les contenus (Lecture seule)
Route::get('/posts',   [PostController::class, 'apiIndex']);
Route::get('/agendas', [\App\Http\Controllers\Admin\AgendaController::class, 'apiIndex']);
Route::get('/avis',    [\App\Http\Controllers\Admin\AvisController::class, 'apiIndex']);
Route::get('/videos',  [\App\Http\Controllers\Admin\VideoController::class, 'apiIndex']);
Route::get('/search-preview', [\App\Http\Controllers\PublicController::class, 'rechercheApi']);

// Route protégée par Token (Optionnel - Pour de futurs besoins externes)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});