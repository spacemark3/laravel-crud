<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Categoria;

/**
 * Articolo Model
 *
 * This class represents an Article/Item entity in the application.
 * It serves as the bridge between the database table and the application logic,
 * providing an eloquent interface for database operations.
 *
 * @package App\Models
 */
class Articolo extends Model
{
    protected $table = 'articoli';

    protected $fillable = [
        'titolo',
        'contenuto',
        'categoria_id',
        'immagine'
    ];

    public function categoria(): BelongsTo
    {
        /**
         * Get the category that this article belongquindis to.

         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        return $this->belongsTo(Categoria::class);
    }
    public function setTitoloAttribute($value)
    {
        $this->attributes['titolo'] = ucfirst(strtolower($value));
    }
    public function getTitoloAttribute($value)
    {
        return strtoupper($value);
    }
}
