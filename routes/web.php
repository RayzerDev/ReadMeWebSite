<?php

use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\HistoireController;
use App\Http\Controllers\EquipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("index");

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::resource('/storys', HistoireController::class);
Route::put('/active/{histoire}', [HistoireController::class, 'toggle'])->name('active.toggle');
Route::resource("equipe", EquipeController::class)->only("index");
Route::get('/chapitres/{id}', [ChapitreController::class, 'show'])->name('chapitres.show');
