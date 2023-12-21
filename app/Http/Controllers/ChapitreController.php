<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChapitreController extends Controller
{

    public function show($id)
    {
        $chapitre = Chapitre::findOrFail($id);
        $en_cour = Session::get('en_cour', []);

        if ($chapitre->premier) {
            $en_cour = [$chapitre->id];
        } else {
            if (!in_array($chapitre->id, $en_cour)) {
                $en_cour[] = $chapitre->id;
            }
        }
        Session::put('en_cour', $en_cour);

        return view('chapitres.show', ['chapitre' => $chapitre, 'title' => $chapitre->titrecourt, 'en_cour' => $en_cour]);
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

    public function create(Histoire $histoire){
        return view('chapitres.create', ['title' => "Créer un chapitre", 'histoire'=>$histoire]);
    }

    public function store(Request $request){
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
        $chapitre ->histoire_id = $request->histoire_id;
        $chapitre ->premier = $request->premier ?? false;
        $chapitre ->save();
        return back();
    }
}
