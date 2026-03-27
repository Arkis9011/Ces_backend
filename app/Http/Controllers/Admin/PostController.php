<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Exception;

class PostController extends Controller
{
    /**
     * Méthode privée pour l'upload vers ImageKit
     * Adaptée de ton AvisController pour garantir la compatibilité Laragon/Windows
     */
    private function uploadToImageKit($file, $title, $folder)
    {
        $response = Http::withBasicAuth(env('IMAGEKIT_PRIVATE_KEY'), '')
            ->withoutVerifying() // INDISPENSABLE sur Laragon pour éviter le rejet SSL
            ->attach(
                'file', 
                file_get_contents($file->getRealPath()), 
                Str::slug($title) . '.' . $file->getClientOriginalExtension()
            )
            ->post('https://upload.imagekit.io/api/v1/files/upload', [
                'fileName' => Str::slug($title) . '_' . time(),
                'folder'   => $folder,
            ]);

        if ($response->failed()) {
            throw new Exception("Erreur ImageKit : " . json_encode($response->json()));
        }

        return $response->json()['url'];
    }

    /**
     * Affiche le Dashboard avec toutes les données
     */
   public function index(Request $request)
{
    // 1. On définit le tri par défaut sur 'date_publication' au lieu de 'created_at'
    // Si aucun paramètre n'est passé dans l'URL, on prend 'date_publication' en 'desc'
    $sort = $request->get('sort', 'date_publication'); 
    $direction = $request->get('direction', 'desc') === 'asc' ? 'asc' : 'desc';

    // 2. Pagination pour les Actualités (Modèle Post)
    // On s'assure que si c'est le tri par défaut, on utilise bien la colonne date_publication
    $postSort = in_array($sort, ['titre', 'date_publication', 'created_at']) ? $sort : 'date_publication';
    $posts = Post::orderBy($postSort, $direction)->paginate(5, ['*'], 'posts');

    // 3. Pagination pour l'Agenda (Modèle Agenda)
    // Ici, on fait correspondre 'date_publication' avec la colonne 'date' de ton modèle Agenda
    $agendaSort = ($sort === 'date_publication') ? 'date' : (($sort === 'titre') ? 'title' : $sort);
    $agendaSort = in_array($agendaSort, ['title', 'date', 'created_at']) ? $agendaSort : 'date';
    $agendas = \App\Models\Agenda::orderBy($agendaSort, $direction)->paginate(5, ['*'], 'agendas');
    // 4. Pagination pour les Vidéos
    $videoSort = ($sort === 'titre') ? 'title' : $sort;
    $videoSort = in_array($videoSort, ['title', 'created_at']) ? $videoSort : 'created_at';
    $videos = \App\Models\Video::orderBy($videoSort, $direction)->paginate(5, ['*'], 'videos');

    // 5. Pagination pour les Avis
    $avisSort = in_array($sort, ['titre', 'created_at']) ? $sort : 'created_at';
    $avis = \App\Models\Avis::latest()->paginate(5, ['*'], 'avis');

    // 6. Pagination pour les Allocutions
    $allocSort = ($sort === 'titre') ? 'titre' : (($sort === 'date_publication') ? 'date_allocution' : $sort);
    $allocSort = in_array($allocSort, ['titre', 'date_allocution', 'created_at']) ? $allocSort : 'created_at';
    $allocutions = \App\Models\Allocution::orderBy($allocSort, $direction)->paginate(5, ['*'], 'allocutions');

    return view('dashboard', compact('posts', 'agendas', 'videos', 'avis', 'allocutions'));
}

    /**
     * Enregistre une actualité
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre'            => 'required|max:255',
            'date_publication' => 'required|date',
            'categorie'        => 'required',
            'resume'           => 'required',
            'contenu'          => 'required',
            'image'            => 'nullable|image|max:2048', 
        ]);

        try {
            $imageUrl = null; 

            // Si une image est présente, on utilise la logique d'AvisController
            if ($request->hasFile('image')) {
                $imageUrl = $this->uploadToImageKit(
                    $request->file('image'), 
                    $request->titre, 
                    '/posts/images'
                );
            }

            // Création de l'entrée en base de données
            Post::create([
                'titre'            => $request->titre,
                'slug'             => Str::slug($request->titre) . '-' . uniqid(),
                'date_publication' => $request->date_publication,
                'categorie'        => $request->categorie,
                'resume'           => $request->resume,
                'contenu'          => $request->contenu,
                'image_url'        => $imageUrl, // Assure-toi que la colonne en BD est bien image_url
            ]);

            return redirect()->route('dashboard')->with('success', 'L\'actualité a été publiée avec succès !');

        } catch (Exception $e) {
            // Renvoie l'erreur détaillée dans l'alerte JS de ton dashboard
            return redirect()->back()
                ->with('js_error', "Erreur technique : " . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Supprime une actualité
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'titre'            => 'required|max:255',
            'date_publication' => 'required|date',
            'categorie'        => 'required',
            'resume'           => 'required',
            'contenu'          => 'required',
            'image'            => 'nullable|image|max:2048', 
        ]);

        try {
            $data = [
                'titre'            => $request->titre,
                'date_publication' => $request->date_publication,
                'categorie'        => $request->categorie,
                'resume'           => $request->resume,
                'contenu'          => $request->contenu,
            ];

            if ($request->hasFile('image')) {
                $data['image_url'] = $this->uploadToImageKit(
                    $request->file('image'), 
                    $request->titre, 
                    '/posts/images'
                );
            }

            $post->update($data);

            return redirect()->route('dashboard')->with('success', 'L\'actualité a été mise à jour !');

        } catch (Exception $e) {
            return redirect()->back()->with('js_error', "Erreur de mise à jour : " . $e->getMessage());
        }
    }

    /**
     * Supprime une actualité
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Article supprimé avec succès !');
    }

    /**
     * API - Pour ton site côté visiteur
     */
    public function apiIndex(Request $request)
    {
        if ($request->has('id')) {
            return response()->json(Post::findOrFail($request->id));
        }
        return response()->json(Post::latest()->get());
    }
}