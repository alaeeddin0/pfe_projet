<?php

namespace App\Http\Controllers;

use App\Models\cours;
use Illuminate\Http\Request;

class gestioncoursController extends Controller
{
    public function index()
    {
       $cours = cours::all();
        return view('professeur.gestioncours',compact('cours'));
    }
}
