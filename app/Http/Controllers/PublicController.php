<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Agenda;
use App\Models\Post; // Si tu as des actualités
use App\Models\Video;
use Illuminate\Http\Request;

class PublicController extends Controller
{
public function agenda()
{
    // On récupère les événements à partir d'aujourd'hui, triés par date proche
    $evenements = \App\Models\Agenda::where('date', '>=', now())
                    ->orderBy('date', 'asc')
                    ->get();

    return view('public.agenda', compact('evenements'));
}

public function president()
{
    $allocutions = \App\Models\Allocution::orderBy('date_allocution', 'desc')->get();
    
    return view('public.president', compact('allocutions'));
}
public function actualites()
{
    // On récupère les actualités triées par date de publication (les plus récentes en premier)
    // On utilise paginate(9) pour afficher 9 articles par page
    $actualites = \App\Models\Post::orderBy('date_publication', 'desc')->paginate(9);

    return view('public.actualites', compact('actualites'));
}


public function mediatheque()
{
    // On récupère les posts qui ont une image pour la galerie photo
    $photos = \App\Models\Post::whereNotNull('image_url')
                ->orderBy('date_publication', 'desc')
                ->get();

    // On récupère toutes les vidéos
    $videos = \App\Models\Video::orderBy('created_at', 'desc')->get();

    return view('public.mediatheque', compact('photos', 'videos'));
}
    
    public function avis()
    {
        // RÉPONSE À TON ERREUR : Il faut récupérer les avis ici !
        $avis = Avis::latest()->get();
        
        // On sépare par commission pour tes onglets
        $avisEco = Avis::where('commission', 'ECOFIN')->latest()->get();
        $avisEnv = Avis::where('commission', 'CERNAT')->latest()->get();
        $avisSocial = Avis::where('commission', 'CSAC')->latest()->get();

        // On envoie TOUTES les variables à la vue
        return view('public.avis', compact('avis', 'avisEco', 'avisEnv', 'avisSocial'));
    }

    public function index()
    {
        $actualites = Post::latest()->take(3)->get();
        $avis = Avis::latest()->take(3)->get();
        
        // Correction de la ligne 26 (utilise 'date' au lieu de 'date_evenement')
        $agendas = Agenda::where('date', '>=', now())
                    ->orderBy('date', 'asc')
                    ->take(4)
                    ->get();
                    
        $derniere_video = Video::latest()->first();

        return view('public.index', compact('actualites', 'avis', 'agendas', 'derniere_video'));
    }
}