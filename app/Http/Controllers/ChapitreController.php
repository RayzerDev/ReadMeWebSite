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
        $chapitre ->titre =  $request->titre;
        $chapitre ->titrecourt =  $request->titrecourt;
        $chapitre ->texte = $request->texte;
        $chapitre ->question = $request->question;
        $chapitre ->media = $request->media;
        $chapitre ->premier = $request->premier ?? false;
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
        $chapitre ->question = $request->question;
        $chapitre ->media = $request->media;
        $chapitre ->histoire_id = $request->histoire_id;
        $chapitre ->premier = $request->premier ?? false;
        $chapitre ->save();
        return back();
    }

    public function destroy(Chapitre $chapitre)
    {
        $chapitre->delete();

        return redirect()->route('histoires.encours', $chapitre->histoire_id)->with('success', 'Avis supprimé avec succès.');
    }

    public function storeLiaison(Request $request){
        $this->validate($request, [
            'source' => 'required',
            'reponse' => 'required',
            'destination' => 'required',
        ]);
        if($request->source != $request->destination){
            DB::table("suites")->insert([
                "chapitre_source_id" => $request->source,
                "reponse" => $request->reponse,
                "chapitre_destination_id" => $request->destination,
                ]);
        }
        return redirect()->back();
    }
    public function deleteLiaison(Request $request)
    {
        $this->validate($request, [
            'source' => 'required',
            'destination' => 'required'
        ]);
        DB::table("suites")
        ->where("chapitre_source_id",$request->source)
        ->where("chapitre_destination_id",$request->destination)
        ->delete();;
        return redirect()->back();
    }
}
