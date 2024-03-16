<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cours;
use App\Models\note;
use App\Models\exam;
use App\Models\rapports;
class chercherControllerprofnotes extends Controller
{
    public function chercher(Request $request)
    {
        $searchTerm = $request->input('search_box');
        $notes = note::where('etudiant_id', 'like', "%$searchTerm%")
        ->orWhere('matiere', 'like', "%$searchTerm%")
        ->orWhere('note', 'like', "%$searchTerm%")
        ->orWhereHas('etudiant', function ($query) use ($searchTerm) {
            $query->where('prenom', 'like', "%$searchTerm%")
                  ->orWhere('nom', 'like', "%$searchTerm%");
        })
        ->with('etudiant')
        ->get();
        return view('/professeur/chercheresultatprofnotes')->with('notes',$notes);       
        }
}