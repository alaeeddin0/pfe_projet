<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\rapports;
use Illuminate\Http\Request;
use PDF;

class gestionrapportController extends Controller
{
    public function index()
    {
        $rapports = rapports::all();
        return view('professeur.gestionrapport',compact('rapports'));
    }
    public function generatePDF($id)
    {
        // Récupérer le rapport correspondant à l'ID
        $rapp = rapports::findOrFail($id);
    
        // Charger la vue PDF et passer le contenu du rapport
        $pdf = PDF::loadView('professeur.ajouterrapport', compact('rapp'));
    
        // Télécharger le PDF
        return $pdf->download('rapport.pdf');
    }

}