<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Models\exam;

class ajouterexamController extends Controller
{
    public function index()
    {
        
        return view('professeur.ajouterexam');
    }
    public function store(Request $request)
    {
        $request->validate([
            'matiere' => 'required',
            'date' => 'required|date',
            'heure' => 'required',
        ]);

        exam::create($request->all());

        return redirect()->route('professeur.gestionexam')
            ->with('success', 'Examen ajouté avec succès.');
    }


}