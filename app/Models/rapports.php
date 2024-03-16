<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rapports extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_rapport',
        'nom_professeur',
        'rapport',
        'pdf_path '
        ];


}

