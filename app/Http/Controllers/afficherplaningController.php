<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exam;

class afficherplaningController extends Controller
{
    public function index()
    {
        $exams = exam::all();
        return view('etudiant.planing', compact('exams'));
    }
}
