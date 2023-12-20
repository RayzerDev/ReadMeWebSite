<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    public function show($idHistoire){
        $histoire = Histoire::find($idHistoire);
    }
}
