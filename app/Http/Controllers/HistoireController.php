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

    public function accueil(){
        $derniereHistoire = Histoire::latest()->first();
        return view('welcome', ['derniereHistoire' => $derniereHistoire]);
    }

    public function show($id){
        $histoire = Histoire::find($id);
        return view('storys.show', ['histoire' => $histoire]);
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
