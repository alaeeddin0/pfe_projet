<?php
use App\Http\Controllers\afficherplaningController;
use App\Http\Controllers\couretudController;
use App\Http\Controllers\affichernotesController;
use App\Http\Controllers\affichercoursController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\gestionetudiantController;
use App\Http\Controllers\updateprofileadminController;
use App\Http\Controllers\ajouteretudiantController;
use App\Http\Controllers\ajouterprofesseur;
use App\Http\Controllers\profileadminController;
use App\Http\Controllers\gestionprofesseurController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\ProfilprofesseurController;
use App\Http\Controllers\ajoutercoursController;
use App\Http\Controllers\gestioncoursController;
use App\Http\Controllers\gestionnotesController;
use App\Http\Controllers\ajouternoteController;
use App\Http\Controllers\gestionexamController;
use App\Http\Controllers\ajouterexamController;
use App\Http\Controllers\gestionrapportController;
use App\Http\Controllers\ajouterrapportController;
use App\Http\Controllers\profiletudiantController;
use App\Http\Controllers\chercherControllerProf;

use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\detailsinscriptionsController;
use App\Http\Controllers\chercherControllerProfcours;
use App\Http\Controllers\chercherControllerAdmin;
use App\Http\Controllers\chercherControllerprofnotes;
use App\Http\Controllers\chercherControllerprofexams;
use App\Http\Controllers\chercherControllerprofrapports;
use App\Http\Controllers\chercherControllerEtudiantcours;
use App\Http\Controllers\chercheetudiantnoteController;
use App\Http\Controllers\chercherControllerEtudiantexam;

Route::get('/', function () {
    return view('auth.login');

});
Route::post('/auth/login', [InscriptionController::class, 'inscription'])->name('inscription'); // Route pour l'inscription


Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:etudiant'])->group(function () {
    Route::get('/Etudiant/home', [EtudiantController::class, 'home'])->name('Etudiant.home');
    Route::get('/Etudiant/cours', [couretudController::class, 'index'])->name('Etudiant.cours');
    Route::get('//Etudiant/notes', [affichernotesController::class, 'showNotes'])->name('Etudiant.notes');
    Route::get('/Etudiant/notes/telecharger-pdf', [affichernotesController::class,'telechargerPDF'])->name('telechargerPDF');
    Route::get('/Etudiant/planing', [afficherplaningController::class, 'index'])->name('Etudiant.planing');
    Route::get('/Etudiant/profile', [profiletudiantController::class, 'index'])->name('Etudiant.profileetudiant');
    Route::post('/Etudiant/chercheresultatetudiantcours', [chercherControllerEtudiantcours::class,'chercher'])->name('chercheretudiantcours');
    Route::post('/Etudiant/resultatetudiantnote', [chercheetudiantnoteController::class,'chercher'])->name('chercheretudiantnotes');
    Route::post('/Etudiant/chercherresultatetudiantexams', [chercherControllerEtudiantexam::class,'chercher'])->name('chercheretudiantexams');
    Route::get('/Etudiant/planing', [afficherplaningController::class, 'index'])->name('Etudiant.planing');
});

  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'nbusers'])->name('admin.home');
    Route::get('/admin/gestionprofesseur', [gestionprofesseurController::class,'index'])->name('admin.gestionprofesseur');
    Route::get('/admin/gestionetudiant', [gestionetudiantController::class,'index'])->name('admin.gestionetudiant');
    Route::get('/admin/profile', [profileadminController::class,'index'])->name('admin.profile');
    Route::get('/admin/ajouteretudiant', [ajouteretudiantController::class,'index'])->name('admin.ajouteretudiant');
    Route::post('/ajouteretudiant/traitement', [ajouteretudiantController::class,'ajouteretudianttraitement']);
    Route::get('/admin/ajouterprofesseur', [ajouterprofesseur::class,'index'])->name('admin.ajouterprofesseur');
    Route::post('/ajouterprofesseur/traitement', [ajouterprofesseur::class,'ajouterprofesseurtraitement']);
    Route::get('/admin/updateetudiant/{id}', [ajouteretudiantController::class,'updateetudiant']);
    Route::post('/updateetudiant/traitement', [ajouteretudiantController::class,'upadateetudianttraitement']);
    Route::get('/admin/updateprofesseur/{id}', [ajouterprofesseur::class,'updateprofesseur']);
    Route::post('/updateprofesseur/traitement', [ajouterprofesseur::class,'upadateprofesseurtraitement']);
    Route::get('/admin/deleteprofesseur/{id}', [ajouterprofesseur::class,'deleteprofesseur']);
    Route::get('/admin/deleteetudiant/{id}', [ajouteretudiantController::class,'deleteetudiant']);
    Route::get('/admin/home', [AdminController::class, 'nbusers'])->name('admin.home');
    Route::post('/admin/chercheresultat', [chercherControllerAdmin::class,'chercher'])->name('chercher');
    Route::get('/admin/DemandeInscription', [InscriptionController::class, 'index'])->name('admin.DemandeInscription');
    Route::get('/admin/declinerEtudiant/{id}', [detailsinscriptionsController::class,'declinerEtudiant']);
    Route::post('/detailsinscription/traitement', [detailsinscriptionsController::class,'indextraitement']);
    Route::get('/admin/detailsinscription/{id}', [detailsinscriptionsController::class,'index']);

});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:professeur'])->group(function () {
    Route::get('/professeur/home', [ProfesseurController::class, 'home'])->name('professeur.home');
    Route::get('/professeur/profile', [ProfilprofesseurController::class,'index'])->name('professeur.profile');
    Route::get('/professeur/ajoutercours', [ajoutercoursController::class,'index'])->name('professeur.ajoutercours');
    Route::post('/ajoutercours/traitement', [AjouterCoursController::class,'ajouterCourstraitement']);
    Route::get('/professeur/gestioncours', [gestioncoursController::class,'index'])->name('professeur.gestioncours');
    Route::get('/professeur/ajouternote', [ajouternoteController::class,'index'])->name('professeur.ajouternote');
    Route::post('/professeur/ajouternote/form', [ajouternoteController::class,'store'])->name('notes.ajout');
    Route::get('/professeur/gestionnotes', [gestionnotesController::class,'index'])->name('professeur.gestionnotes');
    Route::get('/professeur/ajouterexam', [ajouterexamController::class,'index'])->name('professeur.ajouterexam');
    Route::get('/professeur/gestionexam', [gestionexamController::class,'index'])->name('professeur.gestionexam');
    Route::get('/professeur/ajouterrapport', [ajouterrapportController::class,'index'])->name('professeur.ajouterrapport');
    Route::get('/professeur/gestionrapport', [gestionrapportController::class,'index'])->name('professeur.gestionrapport');    
    Route::post('/ajouterrapport/traitement', [AjouterRapportController::class, 'traiter'])->name('ajouterrapport.traitement');
    Route::post('/professeur/chercheresultatProf', [chercherControllerProf::class,'chercher'])->name('chercherProf');
    Route::get('/professeur/gestionrapport/{id}', [gestionrapportController::class, 'generatePDF'])->name('rapport.generatePDF');
    Route::post('/professeur/chercheresultatprofcours', [chercherControllerprofcours::class,'chercher'])->name('chercherprofcours');
    Route::post('/professeur/chercheresultatprofnotes', [chercherControllerprofnotes::class,'chercher'])->name('chercherprofnotes');
    Route::post('/professeur/chercheresultatprofexams', [chercherControllerprofexams::class,'chercher'])->name('chercherprofexams');
    Route::post('/professeur/chercheresultatprofrapports', [chercherControllerprofrapports::class,'chercher'])->name('chercherprofrapports');
    Route::get('/professeur/ajouterexam', [ajouterexamController::class, 'index'])->name('professeur.ajouterexam');
    Route::post('/professeur/ajouterexam', [ajouterexamController::class, 'store'])->name('professeur.ajouterexamform');
});