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
        // Paramètres de tri par défaut
        $sort = $request->get('sort', 'created_at');
        $direction = $request->get('direction', 'desc');

        // On s'assure que le tri est sécurisé (colonnes autorisées)
        $allowedSorts = ['titre', 'date_publication', 'created_at', 'title', 'date'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'created_at';
        }

        // Pagination indépendante pour chaque type
        $posts   = Post::orderBy($sort == 'title' ? 'titre' : ($sort == 'date' ? 'date_publication' : $sort), $direction)
                       ->paginate(5, ['*'], 'posts');
        
        $agendas = \App\Models\Agenda::orderBy($sort == 'titre' ? 'title' : $sort, $direction)
                                     ->paginate(5, ['*'], 'agendas');
        
        $videos  = \App\Models\Video::orderBy($sort == 'titre' ? 'title' : $sort, $direction)
                                    ->paginate(5, ['*'], 'videos');
        
        $avis    = \App\Models\Avis::orderBy($sort == 'title' ? 'titre' : $sort, $direction)
                                   ->paginate(5, ['*'], 'avis');

        return view('dashboard', compact('posts', 'agendas', 'videos', 'avis'));
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