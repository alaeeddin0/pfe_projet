<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use App\Models\Professeur;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.login');
    }
    public function nbusers()
    {
        $nombreEtudiants = Etudiant::count();
        $nombreProfesseurs = Professeur::count();
        return view('admin.home', compact('nombreEtudiants', 'nombreProfesseurs'));
}



}



