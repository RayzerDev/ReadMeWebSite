<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoireController extends Controller
{
    public function index(){
        $histoires = Histoire::all();
        return view('storys.index', ['histoires' => $histoires]);
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
