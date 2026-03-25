<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;         // Pour tes actualités
use App\Models\Agenda;       // Pour le calendrier
use App\Models\Avis;         // Pour les avis
use App\Models\Video;        // Pour la médiathèque
use App\Models\Allocution;   // Pour les discours

class PublicController extends Controller
{
    /**
     * Affiche la page d'accueil (index)
     */
    public function index()
    {
        // 1. On récupère les 3 dernières actualités
        $actualites = Post::latest()->take(3)->get();

        // 2. On récupère les 3 derniers avis
        $avis = Avis::latest()->take(3)->get();

        // 3. On récupère les 4 prochains événements de l'agenda
        $agendas = Agenda::where('date_evenement', '>=', now())
                         ->orderBy('date_evenement', 'asc')
                         ->take(4)
                         ->get();

        // 4. (Optionnel) Tu peux aussi récupérer la dernière vidéo ou allocution
        $derniere_video = Video::latest()->first();

        // On envoie tout à la vue 'public.index'
        return view('public.index', compact(
            'actualites', 
            'avis', 
            'agendas', 
            'derniere_video'
        ));
    }

    /**
     * Tu pourras ajouter les méthodes pour les autres pages ici
     */
    public function actualites()
    {
        $posts = Post::latest()->paginate(10);
        return view('public.actualites', compact('posts'));
    }
}