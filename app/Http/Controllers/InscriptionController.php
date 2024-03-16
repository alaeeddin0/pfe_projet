<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tempetudiant;

class InscriptionController extends Controller
{
    public function inscription(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:Tempetudiant',
            'username' => 'required|string|unique:Tempetudiant',
            'password' => 'required|string',
        ]);

        

        // Création d'un nouvel enregistrement TempStudent
        $temp = new Tempetudiant(); // Correction: Utilisation de 'temps' au lieu de 'TempStudent'
        $temp->nom = $request->nom;
        $temp->prenom = $request->prenom;
        $temp->email = $request->email;
        $temp->username = $request->username;
        $temp->password = bcrypt($request->password); // Correction: Utilisation de 'mot_de_passe' au lieu de 'password'
        $temp->save();

        return view('/auth/login')->with('status','attend ta verification.');
    }

    public function index()
    {
        $etudiants = Tempetudiant::all();
        return view('admin.DemandeInscription', compact('etudiants'));
    }

    
}