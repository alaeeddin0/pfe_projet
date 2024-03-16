<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Professeur;

class chercherControllerAdmin extends Controller
{
 
    public function chercher(Request $request)
    {
        $searchTerm = $request->input('search_box');

        $etudiants = Etudiant::where('nom', 'like', "%$searchTerm%")->get();
        $professeurs = Professeur::where('nom', 'like', "%$searchTerm%")->get();

        return view('/admin/chercheresultat', compact('etudiants', 'professeurs'));
        }
}