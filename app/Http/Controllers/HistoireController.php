<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class HistoireController extends Controller
{
    public function index(Request $request)
    {
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);
        if (!isset($cat)) {
            if (!isset($value)) {
                $histoires = Histoire::all();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                $histoires = Histoire::where('genre_id', $value)->get();
                $cat = $value;
                Cookie::queue('cat', $cat, 10);            }
        } else {
            if ($cat == 'All') {
                $histoires = Histoire::all();
                Cookie::expire('cat');
            } else {
                $histoires = Histoire::where('genre_id', $cat)->get();
                Cookie::queue('cat', $cat, 10);
            }
        }
        $genres = Histoire::distinct('genre_id')->pluck('genre_id');
        return view('storys.index',
            ['titre' => "Liste des Histoires", 'histoires' => $histoires, 'cat' => $cat, 'genres' => $genres]);
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
}
