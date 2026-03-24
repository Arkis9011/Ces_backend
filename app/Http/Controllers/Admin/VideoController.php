<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Exception;

class VideoController extends Controller
{
    /**
     * Méthode privée pour l'upload sur ImageKit
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
            throw new Exception("Erreur ImageKit Vidéo : " . json_encode($response->json()));
        }

        return $response->json()['url'];
    }

    /**
     * Store (Web)
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'video_file'  => 'nullable|mimes:mp4,mov,avi,wmv|max:51200',
            'url'         => 'nullable|url',
            'description' => 'nullable',
        ]);

        try {
            $finalUrl = $request->url;

            if ($request->hasFile('video_file')) {
                $finalUrl = $this->uploadToImageKit($request->file('video_file'), $request->title, '/videos');
            }

            if (!$finalUrl) {
                return redirect()->back()->with('js_error', "Veuillez fournir un fichier vidéo ou une URL")->withInput();
            }

            Video::create([
                'title'       => $request->title,
                'url'         => $finalUrl,
                'description' => $request->description,
            ]);

            return redirect()->route('dashboard')->with('success', 'Vidéo ajoutée avec succès !');

        } catch (Exception $e) {
            return redirect()->back()->with('js_error', "Erreur technique : " . $e->getMessage())->withInput();
        }
    }

    /**
     * Update (Web)
     */
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $request->validate([
            'title'       => 'required|max:255',
            'video_file'  => 'nullable|mimes:mp4,mov,avi,wmv|max:51200',
            'url'         => 'nullable|url',
            'description' => 'nullable',
        ]);

        try {
            $data = [
                'title'       => $request->title,
                'url'         => $request->url,
                'description' => $request->description,
            ];

            if ($request->hasFile('video_file')) {
                $data['url'] = $this->uploadToImageKit($request->file('video_file'), $request->title, '/videos');
            }

            $video->update($data);

            return redirect()->route('dashboard')->with('success', 'Vidéo mise à jour !');
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
            $video = Video::findOrFail($id);
            $video->delete();
            return redirect()->route('dashboard')->with('success', 'Vidéo supprimée !');
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
            return response()->json(Video::findOrFail($request->id));
        }
        return response()->json(Video::latest()->get());
    }
}