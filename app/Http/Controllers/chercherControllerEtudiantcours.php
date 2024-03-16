<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cours;
use App\Models\note;
use App\Models\exam;
use App\Models\rapports;

class chercherControllerEtudiantcours extends Controller
{
    public function chercher(Request $request)
    {
        $searchTerm = $request->input('search_box');
        $cour = cours::where('nom_cours', 'like', "%$searchTerm%")
        ->orWhere('matiere', 'like', "%$searchTerm%")
        ->orWhere('professeur', 'like', "%$searchTerm%")
        ->get();
        return view('/Etudiant/chercheresultatetudiantcours')->with('cour',$cour);       
        }
}