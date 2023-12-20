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
        return view('chapitres.show', ['chapitre' => $chapitre]);
    }

    public function showChapId($idChap){
        $chapitre = Chapitre::findOrFail($idChap);
        return view('chapitres.show', ['chapitre' => $chapitre]);
    }
}
