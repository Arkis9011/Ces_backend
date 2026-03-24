<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // On autorise l'écriture sur ces colonnes
 protected $fillable = [
        'titre',
        'slug',
        'date_publication',
        'image_url',
        'categorie',
        'resume',
        'contenu',
    ];
}
