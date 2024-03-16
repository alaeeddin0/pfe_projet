<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\note;
use Illuminate\Http\Request;

class gestionnotesController extends Controller
{
    public function index()
    {
        $notes = note::with('etudiant')->get();
        // Récupérer uniquement les étudiants qui ont des notes associées
        $etudiants = User::whereHas('notes')->where('type', 0)->get();
    
        return view('professeur.gestionnotes', compact('etudiants','notes'));
    }
    
    
}