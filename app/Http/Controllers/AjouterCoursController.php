<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\cours;
use App\Models\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjouterCoursController extends Controller
{
 

    public function index()
    {
        return view('professeur.ajoutercours');
    }

    
        public function ajouterCourstraitement(Request $request)
        {
            // Récupérer l'ID de l'utilisateur connecté à l'intérieur de la méthode
           
           
            $request->validate([
                'nom_cours' => 'required',
                'type' => 'required',
                'matiere' => 'required',
                'professeur'=>'required',
                'file_path'=>'required'
            ]);
        

       
            // Créer un nouveau cours avec les données saisies
            $cour = new cours();
            $cour->nom_cours = $request->nom_cours;
            $cour->type= $request->type;
            $cour->matiere = $request->matiere;
            $cour->professeur = $request->professeur;
            $cour->file_path = $request->file_path;
            $cour->save();

            // Rediriger avec un message de succès
            return redirect('/professeur/ajoutercours')->with('status', 'Cours ajouté avec succès.');
       
    }
}
