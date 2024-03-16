<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cours;

class chercherControllerProf extends Controller
{
    public function chercher(Request $request)
    {
        $searchTerm = $request->input('search_box');
        $cour = cours::where('nom_cours', 'like', "%$searchTerm%")
        ->orWhere('matiere', 'like', "%$searchTerm%")
        ->orWhere('professeur', 'like', "%$searchTerm%")
        ->get();
        return view('/professeur/chercheresultatProf')->with('cour', $cour);
        if ($cour->isEmpty()) {
            return view('/professeur/chercheresultatProf')->with('cour', []);
        }
        }
}