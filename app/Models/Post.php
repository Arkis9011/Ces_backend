<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titre',
        'slug',
        'date_publication',
        'categorie',
        'resume',
        'contenu',
        // Images (1 à 6)
        'image_url',
        'image_url_2',
        'image_url_3',
        'image_url_4',
        'image_url_5',
        'image_url_6',
        // Sections (1 à 6)
        'section_1',
        'section_2',
        'section_3',
        'section_4',
        'section_5',
        'section_6',
    ];
}