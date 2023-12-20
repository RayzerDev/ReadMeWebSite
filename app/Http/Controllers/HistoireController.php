<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class HistoireController extends Controller
{
    public function index(Request $request){

        $nbActive = 0;
        Log::info('Hello from index');
        $genre = $request->input('genre', null);
        $value = $request->cookie('genre', null);
        if (!isset($genre) || $genre == 'All') {
            // Si le genre n'est pas défini ou est 'All', récupérez toutes les histoires
            $histoires = Histoire::all();
            $genre = 'All'; // Assurez-vous que le genre est 'All'
            Cookie::expire('genre');
        } else {
            // Si un genre est spécifié, récupérez les histoires correspondantes
            $histoires = Histoire::where('genre_id', $genre)->get();
            Cookie::queue('genre', $genre, 10);
        }
        $genres = Genre::all();

        return view('storys.index',
            ['histoires' => $histoires, 'genre' => $genre, 'genres' => $genres]);

    }

    public function show($idHistoire){
        $histoire = Histoire::find($idHistoire);
        $terminees = $histoire->terminees;
        $avis = $histoire->avis->where('histoire_id', $histoire->id);
        $terminee = 0;
        $nbAvisPositif = $avis->count();
        $auteur = $histoire->user->name;
        foreach ($terminees as $user){
            $terminee += $user->pivot->nombre;
        }
        return view('storys.show', ['histoire' => $histoire, 'terminee' => $terminee, 'nbAvisPos' => $nbAvisPositif, 'auteur' => $auteur]);
    }
    public function accueil(){
        $derniereHistoire = Histoire::latest()->first();
        return view('welcome', ['derniereHistoire' => $derniereHistoire]);
    }

    public function toggle($idHistoire)
    {
        $histoire = Histoire::find($idHistoire);
        if ($histoire->active) {
            $histoire->active = false;
        } else {
            $histoire->active = true;
        }
        $histoire->save();
        return back();
    }

    public function create(){

        return view('storys.create');
    }

    public function store(Request  $request){
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'pitch' => 'required|string',
            'photo' => 'required|url'
            // ... autres règles de validation ...
        ]);
        // Créer une nouvelle instance de l'histoire
        $histoire = new Histoire([
            'titre' => $validatedData['titre'],
            'pitch' => $validatedData['pitch'],
            'photo' => $validatedData['photo'],
            'active' =>  0, // Si 'active' n'est pas défini, par défaut, c'est 0 (non coché)
            'user_id' => Auth::id(),
            "genre_id" =>1
        ]);
        $histoire->save();


        // Rediriger avec un message de succès
        return redirect()->route('storys.index')->with('success', 'L\'histoire a été créée avec succès.');
    }
}
