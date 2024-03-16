<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\note;
use Auth;
use PDF;
use Dompdf\Options;
use Dompdf\Dompdf;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class affichernotesController extends Controller
{

    
    public function showNotes()
    {
        $id = auth()->user()->id;
        $notes = note::where('etudiant_id', $id)->get();
        $moyenne = $notes->avg('note');
        return view('Etudiant.notes', compact('notes', 'moyenne'));
    }

    public function telechargerPDF()
    {
        $id = auth()->user()->id;
        $nom = auth()->user()->nom;
        $prenom = auth()->user()->prenom;
        $notes = note::where('etudiant_id', $id)->get();
        $moyenne = $notes->avg('note');

        $options = new Options([
            'isHtml5ParserEnabled' => true
        ]);

        $dompdf = new Dompdf($options);
        $html = view('Etudiant.pdf', compact('moyenne', 'notes','nom','prenom'))->render();
        $dompdf->loadHtml($html);

        // (Optionnel) Définir la taille et l'orientation du papier
        $dompdf->setPaper('A4', 'portrait');

        // Rendre le PDF
        $dompdf->render();

        // Télécharger le PDF
        return $dompdf->stream('releve_notes.pdf');
    }
}