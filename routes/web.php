<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\AvisController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Administration CES
|--------------------------------------------------------------------------
*/

// Redirection initiale
Route::get('/', function () {
    return redirect()->route('login');
});

// Groupe de routes protégées par authentification (Session Web)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Page principale du Dashboard (Liste des articles)
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

    /**
     * GESTION DES ARTICLES (POSTS)
     * On utilise resource mais on exclut 'index' car il est déjà géré par /dashboard
     */
    Route::resource('posts', PostController::class)->except(['index']);
    Route::resource('agendas', AgendaController::class)->except(['index']);
    Route::resource('avis', AvisController::class)->except(['index']);
    Route::resource('videos', VideoController::class)->except(['index']);

    /**
     * GESTION DU PROFIL (Breeze)
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';