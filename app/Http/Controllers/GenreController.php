<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Psy\Output\Theme;

class GenreController extends Controller
{
    public function index(){
        $themes = Genre::all();
        return view('genres.index', ['genres' => $themes]);
    }

    public function show(Genre $genre){
        $histoires = Histoire::where('genre_id', $genre->id)->get();
        return view('genres.show', ['genre' => $genre, 'histoires' => $histoires]);
    }
}
