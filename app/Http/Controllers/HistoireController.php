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
        $histoireAccueil = Histoire::inRandomOrder()->take(5)->get();
        return view('welcome', ['title'=>"Accueil" , 'histoireAccueil' => $histoireAccueil]);
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
        $histoire = new Histoire([
            'titre' => $request['titre'],
            'pitch' => $request['pitch'],
            'photo' => $request['photo'],
            'active' =>  0,
            'user_id' => Auth::id(),
            "genre_id" =>1
        ]);
        $histoire->save();
        return redirect()->route('histoires.encours', $histoire->id);
    }

    public function encours($id) {
        $histoire= Histoire::findOrFail($id);
        return view('histoires.encours', ['histoire' => $histoire, 'title' => "Histoire en cours de création "]);
    }
}
