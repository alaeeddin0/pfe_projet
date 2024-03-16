<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_profil',
        'nom',
        'prenom',
        'email',
        'username',
        'Mot_de_passe',];

}
