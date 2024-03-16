<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Professeur;
use Illuminate\Http\Request;

class ajouterprofesseur extends Controller
{
    
public function index()
{
    
    return view('admin.ajouterprofesseur');
}
public function ajouterprofesseurtraitement(Request $request){
        $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'email'=> 'required|email|unique:professeurs,email',
            'username'=> 'required',
            'password' => 'required',
        ]);

        $professeur =new Professeur();
        $professeur->nom = $request->nom;
        $professeur->prenom = $request->prenom;
        $professeur->email = $request->email;
        $professeur->username = $request->username;
        $professeur->password = bcrypt($request->password);
        $professeur->save();

        $user =new User();
        $user->nom = $professeur->nom;
        $user->prenom = $professeur->prenom;
        $user->email = $professeur->email;
        $user->username = $professeur->username;
        $user->password = bcrypt($request->password);
        $user->type = 2;
        $user->save();

        

        return redirect('/admin/ajouterprofesseur')->with('status','Professeur ajouté avec succès.');


}
public function updateprofesseur($id){
    $professeurs = Professeur::find($id);
    return view('admin.updateprofesseur',compact('professeurs'));
}
public function upadateprofesseurtraitement(Request $request){
    $request->validate([
        'nom'=> 'required',
        'prenom'=> 'required',
        'email'=> 'required',
        'username'=> 'required',
        'password' => 'required',
    ]);

    $professeur =Professeur::find($request->id);
    if($professeur){
        $professeur->nom = $request->nom;
        $professeur->prenom = $request->prenom;
        $professeur->email = $request->email;
        $professeur->username = $request->username;
        $professeur->password = $request->password;
        $professeur->update();
        $user = User::where('email', $professeur->email)->first();
    if($user){
    $user->nom = $request->nom;
    $user->prenom = $request->prenom;
    $user->username = $request->username;
    $user->password = $request->password;
    $user->update();
    }else {
      
        return redirect()->back()->with('error', 'professeur introuvable.');
    }
    }else {

        return redirect()->back()->with('error', 'professeur introuvable.');
    }
    return redirect('/admin/gestionprofesseur')->with('status','professeur est modifier avec succès.');
}
public function deleteprofesseur($id){
    $professeurs = Professeur::find($id);
    
    if($professeurs){
        $professeurs->delete();
        $user = User::where('email', $professeurs->email)->first();
        if($user){
            $user->delete();
        } else {
            return redirect()->back()->with('error', 'Utilisateur introuvable.');
        }
    } else {
        return redirect()->back()->with('error', 'professeur introuvable.');
    }
    return redirect('/admin/gestionprofesseur')->with('status','professeur est supprimer avec succès.');
}
}