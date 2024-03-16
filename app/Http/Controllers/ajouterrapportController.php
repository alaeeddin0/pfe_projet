<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\rapports;
use Illuminate\Http\Request;
use App\Models\Professeur;
use Dompdf\Dompdf;

use Auth;

class ajouterrapportController extends Controller
{
    public function index()
    {
        
        return view('professeur.ajouterrapport');
    }
    public function traiter(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([

            'rapport' => 'required|string',
        ]);

        $rapport = new rapports();
        $rapport->nom_professeur = Auth::user()->nom_complet;
        $rapport->contenu = $request->rapport;
        $rapport->save(); 
        
        // Générer le fichier PDF
        $pdf = $this->generatePdf($rapport->contenu);
        
        // Enregistrer le fichier PDF sur le serveur
        $pdfPath = public_path('pdf/') . $rapport->id . '.pdf'; // Ajoutez '.pdf' à la fin du nom du fichier
        file_put_contents($pdfPath, $pdf->output());
        
        // Mettre à jour le rapport avec le chemin du fichier PDF
        $rapport->pdf_path = 'pdf/' . $rapport->id . '.pdf'; // Mise à jour du chemin avec le chemin relatif du fichier PDF
        $rapport->save();


        // Rediriger avec un message de succès
        return redirect()->route('professeur.gestionrapport')->with('success', 'Rapport ajouté avec succès!');
    }
    
    public function generatePdf($contenu)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($contenu);

        // (Optionnel) Définir la taille de papier et l'orientation
        $dompdf->setPaper('A4', 'portrait');

        // Rendre le HTML en PDF
        $dompdf->render();

        return $dompdf;
    }


}