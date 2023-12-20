<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use Illuminate\Http\Request;

class HistoireController extends Controller
{
    public function index(){
        $histoires = Histoire::all();
        return view('storys.index', ['histoires' => $histoires]);
    }
}
