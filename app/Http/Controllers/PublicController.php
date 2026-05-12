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
            $q = mb_strtolower($request->q, 'UTF-8');
            $query->where(function ($w) use ($q) {
                $w->whereRaw('LOWER(title) LIKE ?', ["%$q%"])
                    ->orWhereRaw('LOWER(summary) LIKE ?', ["%$q%"])
                    ->orWhereRaw('LOWER(lieu) LIKE ?', ["%$q%"]);
            });
        }

        $sort = $request->get('sort', 'desc');
        $query->orderBy('date', $sort)->orderBy('heure', $sort);

        $evenements = $query->paginate(9);

        if ($request->ajax()) {
            return view('public.partials._agenda_grid', compact('evenements'))->render();
        }

        return view('public.agenda', compact('evenements'));
    }

    public function actualites(Request $request)
    {
        $query = Post::query();

        if ($request->has('q')) {
            $q = mb_strtolower($request->q, 'UTF-8');
            $query->where(function ($w) use ($q) {
                $w->whereRaw('LOWER(titre) LIKE ?', ["%$q%"])
                    ->orWhereRaw('LOWER(resume) LIKE ?', ["%$q%"])
                    ->orWhereRaw('LOWER(contenu) LIKE ?', ["%$q%"]);
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

        if ($request->has('q')) {
            $q = mb_strtolower($request->q, 'UTF-8');
            $query->where(function ($w) use ($q) {
                $w->whereRaw('LOWER(titre) LIKE ?', ["%$q%"])
                    ->orWhereRaw('LOWER(resume) LIKE ?', ["%$q%"]); // Changé de summary à resume
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
        $avis = Avis::orderBy('date_publication', 'desc')->take(3)->get();

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
        $allocutions = Allocution::latest('date_allocution')->paginate(6);
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

        // Suggestions : 3 autres avis de la même commission
        $suggestions = Avis::where('commission', $avisshow->commission)
            ->where('id', '!=', $avisshow->id)
            ->latest()
            ->take(3)
            ->get();

        return view('public.show_avis', compact('avisshow', 'suggestions'));
    }

    public function showAgenda($id)
    {
        $agendashow = Agenda::findOrFail($id);
        return view('public.show_agenda', compact('agendashow'));
    }
    public function recherche(Request $request)
    {
        $q = $request->get('q');
        if (!$q)
            return redirect()->back();

        $posts = Post::where('titre', 'LIKE', "%$q%")->orWhere('resume', 'LIKE', "%$q%")->latest()->take(10)->get();
        $avis = Avis::where('titre', 'LIKE', "%$q%")->orWhere('resume', 'LIKE', "%$q%")->latest()->take(10)->get();
        $agendas = Agenda::where('title', 'LIKE', "%$q%")->orWhere('summary', 'LIKE', "%$q%")->latest()->take(10)->get();
        $videos = Video::where('title', 'LIKE', "%$q%")->latest()->take(5)->get();

        return view('public.recherche', compact('posts', 'avis', 'agendas', 'videos', 'q'));
    }

    public function rechercheApi(Request $request)
    {
        $q = $request->get('q');
        if (strlen($q) < 2)
            return response()->json([]);

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

public function rssFeed()
{
    $posts = Post::orderBy('date_publication', 'desc')
        ->orderBy('created_at', 'desc')
        ->take(20)
        ->get();

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<?xml-stylesheet type="text/xsl" href="/rss-style.xsl"?>' . "\n";
    $xml .= '<rss version="2.0"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:wfw="http://wellformedweb.org/CommentAPI/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
     xmlns:media="http://search.yahoo.com/mrss/">' . "\n";
    $xml .= '    <channel>' . "\n";
    $xml .= '        <title><![CDATA[' . config('app.name', 'Conseil Économique et Social') . ' - Actualités]]></title>' . "\n";
    $xml .= '        <atom:link href="' . url('/feed') . '" rel="self" type="application/rss+xml"/>' . "\n";
    $xml .= '        <link>' . url('/') . '</link>' . "\n";
    $xml .= '        <description><![CDATA[Les dernières actualités du Conseil Économique et Social]]></description>' . "\n";
    $xml .= '        <lastBuildDate>' . now()->toRfc2822String() . '</lastBuildDate>' . "\n";
    $xml .= '        <language>fr</language>' . "\n";
    $xml .= '        <copyright>Conseil Économique et Social</copyright>' . "\n";
    $xml .= '        <sy:updatePeriod>hourly</sy:updatePeriod>' . "\n";
    $xml .= '        <sy:updateFrequency>1</sy:updateFrequency>' . "\n";

    foreach ($posts as $post) {
        $titre = strip_tags($post->titre);
        $titre = str_replace(']]>', ']]&gt;', $titre);
        
        $resume = strip_tags($post->resume ?: \Illuminate\Support\Str::limit(strip_tags($post->contenu), 250));
        $resume = str_replace([']]>', '&nbsp;'], [']]&gt;', ' '], $resume);
        
        $contenu = str_replace([']]>', '&nbsp;'], [']]&gt;', '&#160;'], $post->contenu);
        
        $xml .= '        <item>' . "\n";
        $xml .= '            <title><![CDATA[' . $titre . ']]></title>' . "\n";
        $xml .= '            <link>' . route('actualites.show', $post->id) . '</link>' . "\n";
        $xml .= '            <pubDate>' . \Carbon\Carbon::parse($post->date_publication ?? $post->created_at)->toRfc2822String() . '</pubDate>' . "\n";
        $xml .= '            <dc:creator><![CDATA[Service Communication CES]]></dc:creator>' . "\n";
        
        if ($post->categorie) {
            $cat = strip_tags($post->categorie);
            $cat = str_replace(']]>', ']]&gt;', $cat);
            $xml .= '            <category><![CDATA[' . $cat . ']]></category>' . "\n";
        }
        
        $xml .= '            <guid isPermaLink="true">' . route('actualites.show', $post->id) . '</guid>' . "\n";
        $xml .= '            <description><![CDATA[' . $resume . ']]></description>' . "\n";
        
        $xml .= '            <content:encoded><![CDATA[';
        if ($post->image_url) {
            $xml .= '<div style="margin-bottom: 20px;"><img src="' . url($post->image_url) . '" alt="' . $titre . '" style="max-width: 100%; height: auto;"/></div>';
        }
        $xml .= $contenu;
        $xml .= ']]></content:encoded>' . "\n";
        
        if ($post->image_url) {
            $xml .= '            <enclosure url="' . url($post->image_url) . '" length="0" type="image/jpeg" />' . "\n";
            $xml .= '            <media:content url="' . url($post->image_url) . '" medium="image" />' . "\n";
            $xml .= '            <media:thumbnail url="' . url($post->image_url) . '" />' . "\n";
        }
        
        $xml .= '        </item>' . "\n";
    }

    $xml .= '    </channel>' . "\n";
    $xml .= '</rss>';

    return response($xml, 200, [
        'Content-Type' => 'application/xml; charset=utf-8',
    ]);
}
} // Fin de la classe
