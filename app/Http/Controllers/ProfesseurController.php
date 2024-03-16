<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use App\Models\Professeur;
use Illuminate\Http\Request;
use Auth;

class ProfesseurController extends Controller
{
    public function show()
    {
        return view('professeur.login');
    }
    public function home()
    {
        return view('professeur.home');
    }
    
public function login(Request $request)
{
    $login=$request->login;
    $password=$request->password;

    $credentials = ['email'=>$login,'password'=>$password];

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return to_route('etudiant.home')->with('success','you are logged in');
    } else {
        return back()->withErrors(['email'=>'Email or password incorrect']);
    }

}

public function logout(Request $request)
{
    Auth::guard('professeur')->logout();

    return redirect('/professeur/login');
}
}



