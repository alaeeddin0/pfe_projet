<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Models\note;
use Auth;

class ajouternoteController extends Controller
{
    public function index()
{
    $etudiants = User::where('type', 0)->get();
    return view('professeur.ajouternote', compact('etudiants'));
}


    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'etudiant_id' => 'required|exists:users,id',
            'matiere' => 'required|string|unique:notes,matiere,NULL,id,etudiant_id,' . $request->etudiant_id, 
            'note' => 'required|numeric',
        ], [
            'matiere.unique' => 'La matière a déjà été prise.',
        ]);

    
        Note::create([
            'etudiant_id' => $request->input('etudiant_id'),
            'matiere' => $request->matiere,
            'note' => $request->note,
        ]);
    

        // Rediriger vers une page de succès ou une autre vue
        return redirect()->route('professeur.gestionnotes')->with('success', 'La note a été ajoutée avec succès!');
    }




}