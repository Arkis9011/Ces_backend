<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Agenda;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Allocution;

class PublicController extends Controller
{
    public function agenda()
    {
        // On affiche TOUT (passés et futurs), les plus récents/proches en premier
        $evenements = Agenda::orderBy('date', 'desc')
                            ->orderBy('heure', 'desc')
                            ->get();

        return view('public.agenda', compact('evenements'));
    }

    public function actualites()
    {
        // Tri par date de publication et heure de création (si l'heure n'est pas un champ spécifique)
        $actualites = Post::orderBy('date_publication', 'desc')
                          ->orderBy('created_at', 'desc')
                          ->paginate(9);

        return view('public.actualites', compact('actualites'));
    }

    public function avis()
    {
        // On récupère tout en triant par la date de création (qui contient l'heure par défaut)
        $avis = Avis::latest()->get(); 
        
        $avisEco = Avis::where('commission', 'ECOFIN')->latest()->get();
        $avisEnv = Avis::where('commission', 'CERNAT')->latest()->get();
        $avisSocial = Avis::where('commission', 'CSAC')->latest()->get();

        return view('public.avis', compact('avis', 'avisEco', 'avisEnv', 'avisSocial'));
    }

    public function index()
    {
        // Pour l'accueil, on veut les 3 ou 4 derniers éléments sans restriction de date passée
        $actualites = Post::orderBy('date_publication', 'desc')->take(3)->get();
        $avis = Avis::latest()->take(3)->get();
        $agendas = Agenda::orderBy('date', 'desc')->take(4)->get();
                    
        $derniere_video = Video::latest()->first();

        return view('public.index', compact('actualites', 'avis', 'agendas', 'derniere_video'));
    }

    // ... tes autres fonctions (index, agenda, etc.)

    public function president()
    {
        $allocutions = Allocution::latest('date_allocution')->get();
        return view('public.president', compact('allocutions'));
    }

    public function mediatheque()
    {
        $videos = Video::latest()->paginate(12);
        // Les photos sont tirées des actualités ayant une image
        $photos = Post::whereNotNull('image_url')->where('image_url', '!=', '')->latest()->paginate(12);
        return view('public.mediatheque', compact('videos', 'photos'));
    }
    public function showActualite($id)
    {
        $actualite = Post::findOrFail($id);
        return view('public.show_actualite', compact('actualite'));
    }

    public function showAvis($id)
    {
        $avisshow = Avis::findOrFail($id);
        return view('public.show_avis', compact('avisshow'));
    }

    public function showAgenda($id)
    {
        $agendashow = Agenda::findOrFail($id);
        return view('public.show_agenda', compact('agendashow'));
    }
} // Fin de la classe
