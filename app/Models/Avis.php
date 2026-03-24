<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $fillable = [
    'titre', 
    'slug', 
    'image_url', 
    'resume', 
    'commission', 
    'pdf_url'
];
}
