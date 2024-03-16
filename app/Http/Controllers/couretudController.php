<?php

namespace App\Http\Controllers;
use App\Models\cours;
use Illuminate\Http\Request;

class couretudController extends Controller
{
    public function index() {
        $cours = cours::all();
        return view("Etudiant.cours", compact('cours'));
    }
}
