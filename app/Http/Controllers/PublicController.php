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
    public function agenda(Request $request)
    {
        $query = Agenda::query();

        if ($request->has('q')) {
            $q = $request->q;
            $query->where(function($w) use ($q) {
                $w->where('title', 'LIKE', "%$q%")
                  ->orWhere('summary', 'LIKE', "%$q%")
                  ->orWhere('lieu', 'LIKE', "%$q%");
            });
        }

        $sort = $request->get('sort', 'desc');
        $query->orderBy('date', $sort)->orderBy('heure', $sort);

        $evenements = $query->get();

        if ($request->ajax()) {
            return view('public.partials._agenda_grid', compact('evenements'))->render();
        }

        return view('public.agenda', compact('evenements'));
    }

    public function actualites(Request $request)
    {
        $query = Post::query();

        // Recherche locale
        if ($request->has('q')) {
            $q = $request->q;
            $query->where(function($w) use ($q) {
                $w->where('titre', 'LIKE', "%$q%")
                  ->orWhere('resume', 'LIKE', "%$q%")
                  ->orWhere('contenu', 'LIKE', "%$q%");
            });
        }

        // Filtrage par catégorie
        if ($request->has('category') && $request->category != 'all') {
            $query->where('categorie', $request->category);
        }

        // Tri
        $sort = $request->get('sort', 'desc');
        $query->orderBy('date_publication', $sort)->orderBy('created_at', $sort);

        $actualites = $query->paginate(9);

        if ($request->ajax()) {
            return view('public.partials._actualites_grid', compact('actualites'))->render();
        }

        return view('public.actualites', compact('actualites'));
    }

    public function avis(Request $request)
    {
        $query = Avis::query();
    
        // 1. Recherche : Correction de 'summary' par 'resume'
        if ($request->has('q')) {
            $q = $request->q;
            $query->where(function($w) use ($q) {
                $w->where('titre', 'LIKE', "%$q%")
                  ->orWhere('resume', 'LIKE', "%$q%"); // Changé de summary à resume
            });
        }
    
        // 2. Filtre par commission
        if ($request->has('commission') && $request->commission != 'all') {
            $query->where('commission', $request->commission);
        }
    
        // 3. Tri par la date de publication (plus logique pour l'utilisateur) avec fallback
        $sort = $request->get('sort', 'desc');
        $query->orderBy('date_publication', $sort)->orderBy('created_at', $sort);
    
        $avis = $query->paginate(9);
    
        // Gestion AJAX (Pagination/Filtres dynamiques)
        if ($request->ajax()) {
            return view('public.partials._avis_grid', compact('avis'))->render();
        }
    
        return view('public.avis', compact('avis'));
    }

    public function index()
    {
        // Pour l'accueil, on veut les 3 ou 4 derniers éléments
        $actualites = Post::orderBy('date_publication', 'desc')->take(3)->get();
        $avis = Avis::latest()->take(3)->get();
        
        // On affiche uniquement les événements dont la date est passée ou égale à aujourd'hui (sans l'heure)
        $agendas = Agenda::whereDate('date', '>=', now()->toDateString())
                         ->orderBy('date', 'asc')
                         ->take(4)
                         ->get();
                    
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
        // 1. On récupère l'article avec toutes ses nouvelles colonnes (sections et images)
        $actualite = Post::findOrFail($id);

        // 2. On récupère 3 autres articles de la même catégorie pour la section "À lire aussi"
        // On exclut l'article actuel pour ne pas l'avoir en double
        $suggestions = Post::where('categorie', $actualite->categorie)
                            ->where('id', '!=', $actualite->id)
                            ->latest()
                            ->take(3)
                            ->get();

        // 3. On envoie le tout à la vue
        return view('public.show_actualite', compact('actualite', 'suggestions'));
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
    public function recherche(Request $request)
    {
        $q = $request->get('q');
        if (!$q) return redirect()->back();

        $posts = Post::where('titre', 'LIKE', "%$q%")->orWhere('resume', 'LIKE', "%$q%")->latest()->take(10)->get();
        $avis = Avis::where('titre', 'LIKE', "%$q%")->orWhere('resume', 'LIKE', "%$q%")->latest()->take(10)->get();
        $agendas = Agenda::where('title', 'LIKE', "%$q%")->orWhere('summary', 'LIKE', "%$q%")->latest()->take(10)->get();
        $videos = Video::where('title', 'LIKE', "%$q%")->latest()->take(5)->get();

        return view('public.recherche', compact('posts', 'avis', 'agendas', 'videos', 'q'));
    }

    public function rechercheApi(Request $request)
    {
        $q = $request->get('q');
        if (strlen($q) < 2) return response()->json([]);

        $results = [];

        $posts = Post::where('titre', 'LIKE', "%$q%")->latest()->take(3)->get();
        foreach ($posts as $post) {
            $results[] = [
                'title' => $post->titre,
                'url' => route('actualites.show', $post->id),
                'type' => 'Actualité'
            ];
        }

        $avis = Avis::where('titre', 'LIKE', "%$q%")->latest()->take(3)->get();
        foreach ($avis as $a) {
            $results[] = [
                'title' => $a->titre,
                'url' => route('avis.detail', $a->id),
                'type' => 'Avis'
            ];
        }

        $agendas = Agenda::where('title', 'LIKE', "%$q%")->latest()->take(3)->get();
        foreach ($agendas as $ag) {
            $results[] = [
                'title' => $ag->title,
                'url' => route('agenda.show', $ag->id),
                'type' => 'Événement'
            ];
        }

        return response()->json($results);
    }
} // Fin de la classe
