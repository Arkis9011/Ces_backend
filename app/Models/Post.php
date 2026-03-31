<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // On autorise l'écriture sur ces colonnes (Mass Assignment)
    protected $fillable = [
        'titre',
        'slug',
        'date_publication',
        'categorie',
        'resume',
        'contenu',
        // Colonnes d'images supplémentaires
        'image_url',
        'image_url_2',
        'image_url_3',
        'image_url_4',
        // Zones de texte supplémentaires
        'section_1',
        'section_2',
        'section_3',
    ];
}