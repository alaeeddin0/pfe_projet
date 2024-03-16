<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cours;
use App\Models\note;
use App\Models\exam;
use App\Models\rapports;
class chercherControllerEtudiantexam extends Controller
{
    public function chercher(Request $request)
    {
        $searchTerm = $request->input('search_box');
        $exams = exam::where('matiere', 'like', "%$searchTerm%")
        ->orWhere('date', 'like', "%$searchTerm%")
        ->orWhere('heure', 'like', "%$searchTerm%")
        ->get();
        return view('/Etudiant/chercherresultatetudiantexams')->with('exams',$exams);       
        }
}