<?php

namespace App\Http\Controllers;

use App\Models\exam;
use Illuminate\Http\Request;

class gestionexamController extends Controller
{
    public function index()

    { 
        $exams = exam::all();    
        return view('professeur.gestionexam',compact('exams'));
    }
}