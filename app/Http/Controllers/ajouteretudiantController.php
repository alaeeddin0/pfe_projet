<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class ajouteretudiantController extends Controller
{
    public function index()
    {
        
        return view('admin.ajouteretudiant');
    }
    public function ajouteretudianttraitement(Request $request){
            $request->validate([
                'nom'=> 'required',
                'prenom'=> 'required',
                'email'=> 'required|email|unique:etudiants,email',
                'username'=> 'required',
                'password' => 'required',
            ]);


            $etudiant =new Etudiant();
            $etudiant->nom = $request->nom;
            $etudiant->prenom = $request->prenom;
            $etudiant->email = $request->email;
            $etudiant->username = $request->username;
            $etudiant->password = bcrypt($request->password);
            $etudiant->save();

            $user =new User();
            $user->nom = $etudiant->nom;
            $user->prenom = $etudiant->prenom;
            $user->email = $etudiant->email;
            $user->username = $etudiant->username;
            $user->password = bcrypt($request->password);
            $user->type = 0;
            $user->save();
            
            return redirect('/admin/ajouteretudiant')->with('status','Étudiant ajouté avec succès.');


    }
    public function updateetudiant($id){
        $etudiants = Etudiant::find($id);
        return view('admin.updateetudiant',compact('etudiants'));
    }
    public function upadateetudianttraitement(Request $request){
        $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'email'=> 'required',
            'username'=> 'required',
            'password' => 'required',
        ]);

        $etudiant =Etudiant::find($request->id);
        if($etudiant){
            $etudiant->nom = $request->nom;
            $etudiant->prenom = $request->prenom;
            $etudiant->email = $request->email;
            $etudiant->username = $request->username;
            $etudiant->password = $request->password;
            $etudiant->update();
            $user = User::where('email', $etudiant->email)->first();
        if($user){
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->update();
        }else {
          
            return redirect()->back()->with('error', 'Étudiant introuvable.');
        }
        }else {

            return redirect()->back()->with('error', 'Étudiant introuvable.');
        }

        return redirect('/admin/gestionetudiant')->with('status','Étudiant est modifier avec succès.');
}
public function deleteetudiant($id){
    $etudiants = Etudiant::find($id);
    
if($etudiants){
    $etudiants->delete();
    $user = User::where('email', $etudiants->email)->first();
    if($user){
        $user->delete();
    } else {
        return redirect()->back()->with('error', 'Utilisateur introuvable.');
    }
} else {
    return redirect()->back()->with('error', 'Étudiant introuvable.');
}
    return redirect('/admin/gestionetudiant')->with('status1','etudiant est supprimer avec succès.');;
}
}