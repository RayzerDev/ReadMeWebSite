<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChapitreController extends Controller
{
    public function show($id){
        $chapitre = Chapitre::findOrFail($id);
        return view('chapitres.show', ['chapitre' => $chapitre, 'title' => $chapitre->titrecourt]);
    }

    public function edit($id){
        $chapitre = Chapitre::findOrFail($id);
        return view('chapitres.edit', ['chapitre' => $chapitre, 'title' => "Editer ".$chapitre->titrecourt]);
    }

    public function update(Request $request, $id){
        $chapitre = Chapitre::find($id);
        $chapitre ->titrecourt =  $request->titrecourt;
        $chapitre ->texte = $request->texte;
        $chapitre ->media = $request->media;
        $chapitre ->save();
        return view('chapitres.show', ['chapitre' => $chapitre, 'title' => $chapitre->titrecourt]);
    }

    public function create(){
        return view('chapitres.create', ['title' => "Créer un chapitre"]);
    }

    public function store(Request $request, $id){
        $histoire = Histoire::findOrFail($id);
        $this->validate($request, [
            'titre' => 'required',
            'titrecourt' => 'required',
            'texte' => 'required',
        ]);

        $chapitre = new Chapitre();
        $chapitre ->titre =  $request->titre;
        $chapitre ->titrecourt =  $request->titrecourt;
        $chapitre ->texte = $request->texte;
        $chapitre ->media = $request->media;
        $chapitre -> histoire()->associate($histoire);
        $chapitre -> premier = $request->premier;
        $chapitre ->save();
        return view('chapitres.show', ['chapitre' => $chapitre, 'title' => $chapitre->titrecourt])->with('msg', 'Chapitre créé avec succès !');
    }
}
