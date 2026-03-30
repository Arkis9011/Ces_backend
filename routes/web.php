<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\AvisController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AllocutionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| 1. ROUTES DU SITE PUBLIC (Accessibles à tous)
|--------------------------------------------------------------------------
*/

// Pages principales
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/apercu', function () { return view('public.apercu'); })->name('apercu');
Route::get('/missions', function () { return view('public.missions'); })->name('missions');
Route::get('/contact', function () { return view('public.contact'); })->name('contact');
Route::get('/partenaires', function () { return view('public.partenaires'); })->name('partenaires');
Route::get('/textes', function () { return view('public.textes'); })->name('textes');
Route::get('/bureau', function () { return view('public.bureau'); })->name('bureau');
Route::get('/assemblee', function () { return view('public.assemblee'); })->name('assemblee');
Route::get('/commissions', function () { return view('public.commissions'); })->name('commissions');
Route::get('/fonctionnement', function () { return view('public.fonctionnement'); })->name('fonctionnement');
Route::get('/avis', [PublicController::class, 'avis'])->name('avis');
Route::get('/avis/{id}', [PublicController::class, 'showAvis'])->name('avis.detail');
Route::get('/publications', function () { return view('public.publications'); })->name('publications');
Route::get('/actualites', [PublicController::class, 'actualites'])->name('actualites');
Route::get('/actualites/{id}', [PublicController::class, 'showActualite'])->name('actualites.show');
Route::get('/agenda', [PublicController::class, 'agenda'])->name('agenda');
Route::get('/agenda/{id}', [PublicController::class, 'showAgenda'])->name('agenda.show');
Route::get('/contact', function () { return view('public.contact'); })->name('contact');
Route::get('/president', [PublicController::class, 'president'])->name('president');
Route::get('/mediatheque', [PublicController::class, 'mediatheque'])->name('mediatheque');

/**
 * ROUTES API PUBLIQUES
 * On les sort du middleware 'auth' pour que le site puisse 
 * afficher les données sans être connecté.
 */
Route::prefix('api')->group(function () {
    Route::get('/posts', [PostController::class, 'apiIndex']);
    Route::get('/agendas', [AgendaController::class, 'apiIndex']);
    Route::get('/avis', [AvisController::class, 'apiIndex']);
    Route::get('/videos', [VideoController::class, 'apiIndex']);
    Route::get('/allocutions', [AllocutionController::class, 'apiIndex']);
});

/*
|--------------------------------------------------------------------------
| 2. ROUTES D'ADMINISTRATION (Protégées par Auth)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Page principale du Dashboard
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

    /**
     * GESTION DES RESSOURCES (CRUD)
     * Seuls les admins peuvent créer, modifier ou supprimer.
     */
    Route::resource('posts', PostController::class)->except(['index']);
    Route::resource('agendas', AgendaController::class)->except(['index']);
    Route::resource('avis', AvisController::class)->except(['index']);
    Route::resource('videos', VideoController::class)->except(['index']);
    Route::resource('allocutions', AllocutionController::class)->except(['index']);

    /**
     * GESTION DU PROFIL
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';