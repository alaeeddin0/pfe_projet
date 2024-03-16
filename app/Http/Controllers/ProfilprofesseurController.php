<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilprofesseurController extends Controller
{
    public function index()
    {
        return view('professeur.profile');
    }
}
