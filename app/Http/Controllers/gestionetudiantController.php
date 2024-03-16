<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class gestionetudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('admin.gestionetudiant', compact('etudiants'));
    }
}
