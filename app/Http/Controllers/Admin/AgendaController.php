<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AgendaController extends Controller
{
    /**
     * Store (Web)
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'    => 'required|date',
            'heure'   => 'nullable',
            'title'   => 'required|max:255',
            'lieu'    => 'nullable|max:255',
            'summary' => 'required',
        ]);

        try {
            Agenda::create($request->all());
            return redirect()->route('dashboard')->with('success', 'Événement ajouté à l\'agenda !');
        } catch (\Exception $e) {
            return redirect()->back()->with('js_error', "Erreur technique : " . $e->getMessage())->withInput();
        }
    }

    /**
     * Update (Web)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date'    => 'required|date',
            'heure'   => 'nullable',
            'title'   => 'required|max:255',
            'lieu'    => 'nullable|max:255',
            'summary' => 'required',
        ]);

        try {
            $agenda = Agenda::findOrFail($id);
            $agenda->update($request->all());
            return redirect()->route('dashboard')->with('success', 'Événement mis à jour !');
        } catch (\Exception $e) {
            return redirect()->back()->with('js_error', "Erreur de mise à jour : " . $e->getMessage());
        }
    }

    /**
     * Destroy (Web)
     */
    public function destroy($id)
    {
        try {
            $agenda = Agenda::findOrFail($id);
            $agenda->delete();
            return redirect()->route('dashboard')->with('success', 'Événement supprimé !');
        } catch (\Exception $e) {
            return redirect()->back()->with('js_error', "Erreur lors de la suppression.");
        }
    }

    /**
     * API Index
     */
public function apiIndex(Request $request)
{
    if ($request->has('id')) {
        return response()->json(Agenda::findOrFail($request->id));
    }

    $perPage = (int) $request->integer('per_page', 20);
    $perPage = max(1, min($perPage, 100));

    $events = Agenda::orderBy('date', 'desc')
        ->orderBy('heure', 'desc')
        ->paginate($perPage);

    return response()->json($events);
}
}