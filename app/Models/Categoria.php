<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'categorie';

    protected $fillable = [
        'nome',
        'descrizione',
        'immagine'
    ];
       public function articoli(): HasMany
    {
        return $this->hasMany(Articolo::class);
    }
}