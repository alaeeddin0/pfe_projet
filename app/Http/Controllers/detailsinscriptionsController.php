<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountValidationEmail;
use Illuminate\Http\Request;
use App\Models\Tempetudiant;
use App\Models\Etudiant;
use App\Models\USer;
class detailsinscriptionsController extends Controller
{

    public function index($id){
        $etudiant = Tempetudiant::find($id);
        return view('admin.detailsinscription',['etudiant'=>$etudiant]);
    }
    public function indextraitement(Request $request){
        $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'email'=> 'required|email|unique:professeurs,email',
            'username'=> 'required',
            'password' => 'required',
        ]);

        $user =new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->type=0;
        $user->save();
    
        Mail::to($user->email)->send(new AccountValidationEmail($user));

        $etuu =new Etudiant();
        $etuu->nom = $user->nom;
        $etuu->prenom = $user->prenom;
        $etuu->email = $user->email;
        $etuu->username = $user->username;
        $etuu->password = bcrypt($request->password);
        $etuu->save();

        Tempetudiant::where('email', $request->email)->delete();
        

        return redirect('/admin/DemandeInscription')->with('status','Etudiant ajouté avec succès.');


}

public function declinerEtudiant($id)
{
    $etudiants = Tempetudiant::find($id);
    $etudiants->delete();
        return redirect('admin/DemandeInscription')->with('status5','demande est decliner avec succès.');;
    }

}
