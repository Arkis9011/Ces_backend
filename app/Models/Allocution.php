<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allocution extends Model
{
    protected $fillable = ['titre', 'date_allocution', 'document_url'];
}
