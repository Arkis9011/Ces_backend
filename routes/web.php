<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController; // Nouveau contrôleur public
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\AvisController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AllocutionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| 1. ROUTES DU SITE PUBLIC (Accessible par tous)
|--------------------------------------------------------------------------
*/

// La page d'accueil pointe maintenant vers la vue publique
Route::get('/', [PublicController::class, 'index'])->name('home');

// Routes pour les pages qui ne demandent pas de données BD (Statiques)
Route::get('/apercu', function () { return view('public.apercu'); })->name('apercu');
Route::get('/missions', function () { return view('public.missions'); })->name('missions');
Route::get('/contact', function () { return view('public.contact'); })->name('contact');

/*
|--------------------------------------------------------------------------
| 2. ROUTES D'ADMINISTRATION (Protégées par Auth)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Page principale du Dashboard
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

    /**
     * ROUTES API POUR LES MODALES (Fetch JS)
     */
    Route::prefix('api')->group(function () {
        Route::get('/posts', [PostController::class, 'apiIndex']);
        Route::get('/agendas', [AgendaController::class, 'apiIndex']);
        Route::get('/avis', [AvisController::class, 'apiIndex']);
        Route::get('/videos', [VideoController::class, 'apiIndex']);
        Route::get('/allocutions', [AllocutionController::class, 'apiIndex']);
    });

    /**
     * GESTION DES RESSOURCES (CRUD)
     */
    Route::resource('posts', PostController::class)->except(['index']);
    Route::resource('agendas', AgendaController::class)->except(['index']);
    Route::resource('avis', AvisController::class)->except(['index']);
    Route::resource('videos', VideoController::class)->except(['index']);
    Route::resource('allocutions', AllocutionController::class)->except(['index']);

    /**
     * GESTION DU PROFIL (Breeze)
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inclure les routes d'authentification (Login, Register, etc.)
require __DIR__.'/auth.php';