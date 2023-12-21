<?php

use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\HistoireController;
use App\Http\Controllers\EquipeController;
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

Route::get('/', [HistoireController::class, 'index'])->name('storys.index');

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::resource('storys', HistoireController::class);
Route::put('/active/{histoire}', [HistoireController::class, 'toggle'])->name('active.toggle');
Route::resource("equipe", EquipeController::class)->only("index");
Route::resource('user', UserController::class)->only('show')->middleware(['auth']);
Route::get('chapitre/{histoire}', [ChapitreController::class, 'show'])->name('chapitres.show');
Route::resource('avis', AvisController::class)->only(["edit", "destroy", 'update']);
Route::post('/storys/{histoire}/avis', [AvisController::class, 'store'])->name('avis.store');