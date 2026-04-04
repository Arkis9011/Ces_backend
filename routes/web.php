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
| 1. ROUTES DU SITE PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', [PublicController::class, 'index'])->name('home');

// Utilisation de groupes pour plus de clarté
Route::name('public.')->group(function () {
    Route::view('/apercu', 'public.apercu')->name('apercu');
    Route::view('/missions', 'public.missions')->name('missions');
    Route::view('/contact', 'public.contact')->name('contact'); // Une seule fois !
    Route::view('/partenaires', 'public.partenaires')->name('partenaires');
    Route::view('/textes', 'public.textes')->name('textes');
    Route::view('/bureau', 'public.bureau')->name('bureau');
    Route::view('/assemblee', 'public.assemblee')->name('assemblee');
    Route::view('/commissions', 'public.commissions')->name('commissions');
    Route::view('/fonctionnement', 'public.fonctionnement')->name('fonctionnement');
    Route::view('/publications', 'public.publications')->name('publications');
});

// Routes dynamiques
Route::get('/avis', [PublicController::class, 'avis'])->name('avis');
Route::get('/avis/{id}', [PublicController::class, 'showAvis'])->name('avis.detail');
Route::get('/actualites', [PublicController::class, 'actualites'])->name('actualites');
Route::get('/actualites/{id}', [PublicController::class, 'showActualite'])->name('actualites.show');
Route::get('/agenda', [PublicController::class, 'agenda'])->name('agenda');
Route::get('/agenda/{id}', [PublicController::class, 'showAgenda'])->name('agenda.show');
Route::get('/president', [PublicController::class, 'president'])->name('president');
Route::get('/mediatheque', [PublicController::class, 'mediatheque'])->name('mediatheque');
Route::get('/recherche', [PublicController::class, 'recherche'])->name('recherche');


/**
 * ROUTES API PUBLIQUES
 */
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/posts', [PostController::class, 'apiIndex'])->name('posts');
    Route::get('/agendas', [AgendaController::class, 'apiIndex'])->name('agendas');
    Route::get('/avis', [AvisController::class, 'apiIndex'])->name('avis');
    Route::get('/videos', [VideoController::class, 'apiIndex'])->name('videos');
    Route::get('/allocutions', [AllocutionController::class, 'apiIndex'])->name('allocutions');
});

/*
|--------------------------------------------------------------------------
| 2. ROUTES D'ADMINISTRATION
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

    // CRUD complets
    Route::resource('posts', PostController::class)->except(['index']);
    Route::resource('agendas', AgendaController::class)->except(['index']);
    Route::resource('avis', AvisController::class)->except(['index']);
    Route::resource('videos', VideoController::class)->except(['index']);
    Route::resource('allocutions', AllocutionController::class)->except(['index']);

    // Profil
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';