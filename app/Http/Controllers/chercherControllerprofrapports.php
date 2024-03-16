<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cours;
use App\Models\note;
use App\Models\exam;
use App\Models\rapports;

class chercherControllerprofrapports extends Controller
{
    public function chercher(Request $request)
    {
        $searchTerm = $request->input('search_box');
        $rapport = rapports::where('nom_professeur', 'like', "%$searchTerm%")
        ->orWhere('pdf_path', 'like', "%$searchTerm%")
        ->get();
        return view('/professeur/chercheresultatprofrapports')->with('rapport',$rapport);       
        }
}