<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;

class gestionprofesseurController extends Controller
{
    public function index()
    {
        $professeurs = Professeur::all();
        return view('admin.gestionprofesseur', compact('professeurs'));
    }


}
