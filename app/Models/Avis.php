<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    /**
     * La table associée au modèle.
     */
    protected $table = 'avis';

    /**
     * Les attributs assignables en masse.
     * 'date_publication' est ajouté pour permettre l'insertion et la mise à jour.
     */
    protected $fillable = [
        'titre', 
        'slug', 
        'image_url', 
        'resume', 
        'commission', 
        'pdf_url',
        'date_publication'
    ];

    /**
     * Les attributs qui doivent être convertis (castés) en types natifs.
     * En déclarant 'date_publication' comme 'date', Laravel te permettra 
     * d'utiliser des méthodes comme ->format('d/m/Y') directement dessus.
     */
    protected $casts = [
        'date_publication' => 'date',
    ];

    /**
     * Utilise le slug à la place de l'ID pour les recherches dans les routes.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}