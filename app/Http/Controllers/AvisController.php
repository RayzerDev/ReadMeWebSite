<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Avis;
use Illuminate\Support\Facades\Auth;

class AvisController extends Controller
{
    public function store(Request $request, Histoire $histoire)
    {
        $request->validate([
            'contenu' => 'required',
        ]);

        $avis = new Avis();
        $avis->user_id = Auth::id();
        $avis->histoire_id = $histoire->id;
        $avis->contenu = $request->contenu;
        $avis->save();

        return back();
    }

    public function edit(Avis $avi)
    {
        if (Auth::id() != $avi->user_id) {
            return redirect()->back()->with('error', 'Vous n\'avez pas le droit de modifier ce Avis.');
        }

        return view('avis.edit', compact('avi'));
    }

    public function update(Request $request, Avis $avi)
    {
        $request->validate([
            'contenu' => 'required',
        ]);

        if (Auth::id() != $avi->user_id) {
            return redirect()->back()->with('error', 'Vous n\'avez pas le droit de modifier ce Avis.');
        }

        $avi->contenu = $request->contenu;
        $avi->save();

        return redirect()->route('storys.show', ["story" => $avi->histoire_id]);
    }

    public function destroy(Avis $avi)
    {
        if (Auth::id() != $avi->user_id) {
            return redirect()->back()->with('error', 'Vous n\'avez pas le droit de supprimer ce Avis.');
        }

        $avi->delete();

        return redirect()->back()->with('success', 'Avis supprimé avec succès.');
    }
}
