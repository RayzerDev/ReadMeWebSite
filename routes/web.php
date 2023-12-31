<?php

use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\HistoireController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AvisController;
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

Route::get('/', [HistoireController::class, 'accueil'])->name('accueil');

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::resource('histoires', HistoireController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('histoires/create', [HistoireController::class, 'create'])->name("histoires.create");
    Route::post('histoires', [HistoireController::class, 'store'])->name("histoires.store");
});
Route::put('active/{histoire}', [HistoireController::class, 'toggle'])->name('active.toggle');
Route::resource("equipe", EquipeController::class)->only("index");
Route::resource('user', UserController::class)->only('show')->middleware(['auth']);
Route::resource('avis', AvisController::class)->only(["edit", "destroy", 'update']);
Route::post('/histoires/{histoire}/avis', [AvisController::class, 'store'])->name('avis.store');
Route::resource('chapitres', ChapitreController::class);
Route::get('encours/{id}', [HistoireController::class, 'encours'])->name('histoires.encours');
Route::delete('liaisons', [ChapitreController::class,'deleteLiaison'])->name("liaisons.delete");
Route::post('liaisons', [ChapitreController::class, 'storeLiaison'])->name("liaisons.store");
Route::resource('/genres', GenreController::class);