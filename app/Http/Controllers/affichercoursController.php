<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class affichercoursController extends Controller
{

    public function home()
    {
        return view('Etudiants.cours');
    }
}
