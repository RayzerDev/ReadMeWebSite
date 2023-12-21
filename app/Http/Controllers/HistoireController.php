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
            $histoires = Histoire::all();
            $genre = 'All';
            Cookie::expire('genre');
        } else {
            $histoires = Histoire::where('genre_id', $genre)->get();
            Cookie::queue('genre', $genre, 10);
        }
        $genres = Genre::all();

        return view('histoires.index',
            ['histoires' => $histoires, 'genre' => $genre, 'genres' => $genres, 'title'=>"Histoires"]);

    }

    public function accueil(){
        return view('welcome', ['title'=>"Accueil"]);
    }

    public function afficherGenre(){

    }

    public function show(Histoire $histoire){
        return view('histoires.show', ['histoire' => $histoire]);
    }

    public function toggle(Histoire $histoire)
    {
        if ($histoire->active) {
            $histoire->active = false;
        } else {
            $histoire->active = true;
        }
        $histoire->save();
        return back();
    }

    public function create(){

        return view('histoires.create');
    }

    public function store(Request  $request){
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'pitch' => 'required|string',
            'photo' => 'required|url'
        ]);
        $histoire = new Histoire([
            'titre' => $validatedData['titre'],
            'pitch' => $validatedData['pitch'],
            'photo' => $validatedData['photo'],
            'active' =>  0,
            'user_id' => Auth::id(),
            "genre_id" =>1
        ]);
        $histoire->save();


        // Rediriger avec un message de succès
        return redirect()->route('histoires.index')->with('success', 'L\'histoire a été créée avec succès.');
    }
}
