<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Agenda;
use App\Models\Avis;
use App\Models\Video;
use App\Models\Allocution;

class PublicController extends Controller
{
    public function index()
    {
        // On récupère les 3 dernières actualités pour la section que tu m'as montrée
        $actualites = Post::latest('date_publication')->take(3)->get();

        // On récupère aussi les autres données pour les autres sections
        $agendas = Agenda::orderBy('date', 'asc')->where('date', '>=', now())->take(4)->get();
        $avis = Avis::latest()->take(3)->get();

        // On envoie tout à la vue
        return view('public.index', compact('actualites', 'agendas', 'avis'));
    }
}