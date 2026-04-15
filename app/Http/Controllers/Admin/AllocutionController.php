<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allocution;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Exception;

class AllocutionController extends Controller
{
    /**
     * Méthode privée pour l'upload vers ImageKit (Identique à PostController)
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
     * Enregistre une allocution (Logique identique à PostController)
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre'           => 'required|max:255',
            'date_allocution' => 'required|date',
            'document'        => 'nullable|file|mimes:pdf,doc,docx|max:5120', 
        ]);

        try {
            $docUrl = null; 

            if ($request->hasFile('document')) {
                $docUrl = $this->uploadToImageKit(
                    $request->file('document'), 
                    $request->titre, 
                    '/allocutions/documents'
                );
            }

            Allocution::create([
                'titre'           => $request->titre,
                'date_allocution' => $request->date_allocution,
                'document_url'    => $docUrl, 
            ]);

            return redirect()->route('dashboard', ['section' => 'allocutions'])->with('success', 'L\'allocution a été publiée avec succès !');

        } catch (Exception $e) {
            return redirect()->back()
                ->with('js_error', "Erreur technique : " . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Met à jour une allocution (Logique identique à PostController)
     */
    public function update(Request $request, $id)
    {
        $allocution = Allocution::findOrFail($id);
        $request->validate([
            'titre'           => 'required|max:255',
            'date_allocution' => 'required|date',
            'document'        => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        try {
            $data = [
                'titre'           => $request->titre,
                'date_allocution' => $request->date_allocution,
            ];

            if ($request->hasFile('document')) {
                $data['document_url'] = $this->uploadToImageKit(
                    $request->file('document'), 
                    $request->titre, 
                    '/allocutions/documents'
                );
            }

            $allocution->update($data);

            return redirect()->route('dashboard', ['section' => 'allocutions'])->with('success', 'L\'allocution a été mise à jour !');

        } catch (Exception $e) {
            return redirect()->back()->with('js_error', "Erreur de mise à jour : " . $e->getMessage());
        }
    }

    /**
     * Supprime une allocution (Identique à PostController)
     */
    public function destroy($id)
    {
        $allocution = Allocution::findOrFail($id);
        $allocution->delete();

        return redirect()->route('dashboard', ['section' => 'allocutions'])->with('success', 'Allocution supprimée avec succès !');
    }

    /**
     * API - Identique à PostController pour charger les détails dans la modale
     */
    public function apiIndex(Request $request)
    {
        if ($request->has('id')) {
            return response()->json(Allocution::findOrFail($request->id));
        }

        $perPage = (int) $request->integer('per_page', 20);
        $perPage = max(1, min($perPage, 100));

        return response()->json(Allocution::latest()->paginate($perPage));
    }
}