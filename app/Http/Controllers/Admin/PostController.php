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
     * INDISPENSABLE sur Laragon pour éviter le rejet SSL
     */
    private function uploadToImageKit($file, $title, $folder)
    {
        $response = Http::withBasicAuth(env('IMAGEKIT_PRIVATE_KEY'), '')
            ->withoutVerifying() 
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
        $sort = $request->get('sort', 'date_publication'); 
        $direction = $request->get('direction', 'desc') === 'asc' ? 'asc' : 'desc';

        $postSort = in_array($sort, ['titre', 'date_publication', 'created_at']) ? $sort : 'date_publication';
        $posts = Post::orderBy($postSort, $direction)->paginate(5, ['*'], 'posts');

        $agendas = \App\Models\Agenda::latest()->paginate(5, ['*'], 'agendas');
        $videos = \App\Models\Video::latest()->paginate(5, ['*'], 'videos');
        $avis = \App\Models\Avis::latest()->paginate(5, ['*'], 'avis');
        $allocutions = \App\Models\Allocution::latest()->paginate(5, ['*'], 'allocutions');

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
            'image_url_2'      => 'nullable|image|max:2048',
            'image_url_3'      => 'nullable|image|max:2048',
            'image_url_4'      => 'nullable|image|max:2048',
            'section_1'        => 'nullable',
            'section_2'        => 'nullable',
            'section_3'        => 'nullable',
        ]);

        try {
            $data = [
                'titre'            => $request->titre,
                'slug'             => Str::slug($request->titre) . '-' . uniqid(),
                'date_publication' => $request->date_publication,
                'categorie'        => $request->categorie,
                'resume'           => $request->resume,
                'contenu'          => $request->contenu,
                'section_1'        => $request->section_1,
                'section_2'        => $request->section_2,
                'section_3'        => $request->section_3,
            ];

            // Image principale
            if ($request->hasFile('image')) {
                $data['image_url'] = $this->uploadToImageKit($request->file('image'), $request->titre, '/posts/images');
            }

            // Images supplémentaires (2, 3 et 4)
            for ($i = 2; $i <= 4; $i++) {
                $key = "image_url_$i";
                if ($request->hasFile($key)) {
                    $data[$key] = $this->uploadToImageKit($request->file($key), $request->titre . "_$i", '/posts/images');
                }
            }

            Post::create($data);

            return redirect()->route('dashboard')->with('success', 'L\'actualité a été publiée avec succès !');

        } catch (Exception $e) {
            return redirect()->back()
                ->with('js_error', "Erreur technique : " . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Met à jour une actualité
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
            'image_url_2'      => 'nullable|image|max:2048',
            'image_url_3'      => 'nullable|image|max:2048',
            'image_url_4'      => 'nullable|image|max:2048',
            'section_1'        => 'nullable',
            'section_2'        => 'nullable',
            'section_3'        => 'nullable',
        ]);

        try {
            $data = [
                'titre'            => $request->titre,
                'date_publication' => $request->date_publication,
                'categorie'        => $request->categorie,
                'resume'           => $request->resume,
                'contenu'          => $request->contenu,
                'section_1'        => $request->section_1,
                'section_2'        => $request->section_2,
                'section_3'        => $request->section_3,
            ];

            // Mise à jour image principale
            if ($request->hasFile('image')) {
                $data['image_url'] = $this->uploadToImageKit($request->file('image'), $request->titre, '/posts/images');
            }

            // Mise à jour images supplémentaires
            for ($i = 2; $i <= 4; $i++) {
                $key = "image_url_$i";
                if ($request->hasFile($key)) {
                    $data[$key] = $this->uploadToImageKit($request->file($key), $request->titre . "_$i", '/posts/images');
                }
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