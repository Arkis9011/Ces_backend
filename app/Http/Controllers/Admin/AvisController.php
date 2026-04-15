<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Avis;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Exception;

class AvisController extends Controller
{
    /**
     * Méthode privée pour l'upload (Centralisée pour Images et PDF)
     */
    private function uploadToImageKit($file, $title, $folder)
    {
        $http = Http::withBasicAuth(config('services.imagekit.private_key'), '')
            ->timeout(30)
            ->retry(2, 200);

        if (app()->isLocal()) {
            $http = $http->withoutVerifying();
        }

        $response = $http
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
     * Store (Web)
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre'            => 'required|max:255',
            'resume'           => 'required',
            'commission'       => 'required',
            'date_publication' => 'required|date', // Validation de la nouvelle colonne
            'pdf_file'         => 'nullable|mimes:pdf|max:10000', // PDF désormais optionnel
            'image'            => 'nullable|image|max:2048',
        ]);

        try {
            $pdfUrl = null;
            $imageUrl = null;

            // Upload du PDF uniquement s'il est présent
            if ($request->hasFile('pdf_file')) {
                $pdfUrl = $this->uploadToImageKit($request->file('pdf_file'), $request->titre, '/avis/documents');
            }

            // Upload de l'image uniquement si elle est présente
            if ($request->hasFile('image')) {
                $imageUrl = $this->uploadToImageKit($request->file('image'), $request->titre, '/avis/images');
            }

            Avis::create([
                'titre'            => $request->titre,
                'slug'             => Str::slug($request->titre) . '-' . uniqid(),
                'resume'           => $request->resume,
                'commission'       => $request->commission,
                'date_publication' => $request->date_publication, // Enregistrement de la date
                'pdf_url'          => $pdfUrl,
                'image_url'        => $imageUrl,
            ]);

            return redirect()->route('dashboard')->with('success', 'Avis rendu publié !');
        } catch (Exception $e) {
            return redirect()->back()->with('js_error', "Erreur technique : " . $e->getMessage())->withInput();
        }
    }

    /**
     * Update (Web)
     */
    public function update(Request $request, $id)
    {
        $avis = Avis::findOrFail($id);
        
        $request->validate([
            'titre'            => 'required|max:255',
            'resume'           => 'required',
            'commission'       => 'required',
            'date_publication' => 'required|date', // Validation de la date en update
            'pdf_file'         => 'nullable|mimes:pdf|max:10000',
            'image'            => 'nullable|image|max:2048',
        ]);

        try {
            $data = [
                'titre'            => $request->titre,
                'resume'           => $request->resume,
                'commission'       => $request->commission,
                'date_publication' => $request->date_publication, // Mise à jour de la date
            ];

            // Si un nouveau PDF est téléchargé, on met à jour l'URL
            if ($request->hasFile('pdf_file')) {
                $data['pdf_url'] = $this->uploadToImageKit($request->file('pdf_file'), $request->titre, '/avis/documents');
            }

            // Si une nouvelle image est téléchargée, on met à jour l'URL
            if ($request->hasFile('image')) {
                $data['image_url'] = $this->uploadToImageKit($request->file('image'), $request->titre, '/avis/images');
            }

            $avis->update($data);

            return redirect()->route('dashboard')->with('success', 'Avis rendu mis à jour !');
        } catch (Exception $e) {
            return redirect()->back()->with('js_error', "Erreur de mise à jour : " . $e->getMessage());
        }
    }

    /**
     * Destroy (Web)
     */
    public function destroy($id)
    {
        try {
            $avis = Avis::findOrFail($id);
            $avis->delete();
            return redirect()->route('dashboard')->with('success', 'Avis supprimé !');
        } catch (Exception $e) {
            return redirect()->back()->with('js_error', "Erreur lors de la suppression.");
        }
    }

    /**
     * API Index
     */
    public function apiIndex(Request $request)
    {
        if ($request->has('id')) {
            return response()->json(Avis::findOrFail($request->id));
        }

        $perPage = (int) $request->integer('per_page', 20);
        $perPage = max(1, min($perPage, 100));

        // On trie par date_publication pour l'API
        return response()->json(Avis::orderBy('date_publication', 'desc')->paginate($perPage));
    }
}