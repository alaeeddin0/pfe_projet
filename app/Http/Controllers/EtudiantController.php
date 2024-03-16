<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\User;
use App\Models\cours;
use App\Models\note;
use App\Models\exam;
class EtudiantController extends Controller
{
    public function home()
    {
        $etudiant = Auth::user(); 

        $dernierCours = cours::latest()->first();
        $derniereNote = note::latest()->first();
        $dernierExamen = exam::latest()->first();

        return view('etudiant.home', compact('dernierCours', 'derniereNote', 'dernierExamen'));
    }

    public function login(Request $request)
{
    $login=$request->login;
    $password=$request->password;
    $credentials = ['email'=>$login,'password'=>$password];
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return to_route('professeur.home')->with('success','you are logged in');
    } else {
        return back()->withErrors(['email'=>'Email or password incorrect']);
    }
}
}