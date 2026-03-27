<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Agenda extends Model
{
    protected $fillable = ['date', 'heure', 'title', 'lieu', 'summary'];

    /**
     * Permet d'ajouter 'is_today' et 'is_past' automatiquement 
     * lors des appels API (JSON)
     */
    protected $appends = ['is_today', 'is_past'];

    /**
     * Vérifie si l'événement est aujourd'hui
     */
    public function getIsTodayAttribute()
    {
        return Carbon::parse($this->date)->isToday();
    }

    /**
     * Vérifie si l'événement est passé
     */
    public function getIsPastAttribute()
    {
        return Carbon::parse($this->date)->isPast() && !$this->getIsTodayAttribute();
    }
}