<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempetudiant extends Model
{
    use HasFactory;

    protected $table = 'tempetudiant';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'username',
        'password',
        'etat',
    ];

    // Vous pouvez ajouter des relations ou des méthodes ici si nécessaire
}
