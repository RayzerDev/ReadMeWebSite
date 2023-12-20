<?php

namespace App\Http\Controllers;

class EquipeController extends Controller
{
    public function index(){
        $equipe= [
            'nomEquipe'=>"L'equipes de l'année !",
            'logo'=>"resources/images/logo.jpg",
            'slogan'=>"....",
            'localisation'=>"06E",
            'membres'=> [
                [ 'nom'=>"Karamucki",'prenom'=>"Louis", 'image'=>"equipe/images/test.jpg", 'fonctions'=>["validateur","développer", "concepteur"] ],
                [ 'nom'=>"Allaert",'prenom'=>"Damien", 'image'=>"equipe/images/test.jpg", 'fonctions'=>["développer", "concepteur"] ],
                [ 'nom'=>"Guiffroy",'prenom'=>"Matteo", 'image'=>"equipe/images/test.jpg", 'fonctions'=>["développer", "concepteur"] ],
                [ 'nom'=>"Rolland",'prenom'=>"Anthony", 'image'=>"equipe/images/test.jpg", 'fonctions'=>["développer", "concepteur"] ],
                [ 'nom'=>"Desprez",'prenom'=>"Tom", 'image'=>"equipe/images/test.jpg", 'fonctions'=>["développer", "concepteur"] ],
                [ 'nom'=>"Duez",'prenom'=>"Benoit", 'image'=>"equipe/images/test.jpg", 'fonctions'=>["développer", "concepteur"] ],
                [ 'nom'=>"Marcezwski",'prenom'=>"Lena", 'image'=>"equipe/images/test.jpg", 'fonctions'=>["développer", "concepteur"] ],
                [ 'nom'=>"Morice",'prenom'=>"Noemie", 'image'=>"equipe/images/test.jpg", 'fonctions'=>["développer", "concepteur"] ],
                [ 'nom'=>"Renaud",'prenom'=>"Ilona", 'image'=>"equipe/images/test.jpg", 'fonctions'=>["développer", "concepteur"] ],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipe' => $equipe]);
    }
}