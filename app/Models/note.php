<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class note extends Model
{
      protected $fillable = ['etudiant_id', 'matiere', 'note'];
    
      public function etudiant()
      {
          return $this->belongsTo(User::class, 'etudiant_id');
      }}
